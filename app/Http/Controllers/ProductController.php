<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\AttributesModel;
use App\Models\Brand;
use App\Models\DeliveryZone;
use App\Models\ProductCategory;
use App\Models\Stock;
use App\Models\Tag;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        $product = new Product();
        $attributes =  AttributesModel::allActivated();
        $categories = ProductCategory::allActivated();
        $brands = Brand::allActivated();
        $deliveryZones = DeliveryZone::allActivated();
        $units = Unit::allActivated();

        return view('product.create', compact('product', 'units', 'categories', 'attributes', 'brands', 'deliveryZones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {

        $data = $request->only(
            [
                'name', //OK
                'sku', //OK
                'sale_price', //OK
                'discounted_price', //OK
                'start_date_discounted_price', //OK
                'end_date_discounted_price', //OK
                'quantity_available', //OK
                'minimum_quantity', //OK
                'maximum_quantity',
                'purchase_price', //OK
                'expiration_date', //OK
                'expiry_period_type', //ok
                'expiry_period', //ok
                'outstanding_image',
                'description', //OK
                'description_small', //OK
                'purchase_price',      //OK
                'enable_stock', //OK
                'brand_id', //ok
                'terms_id', //ok
                'enable_reservation', //ok
                'deliveryZones', //ok
                'tag_id', //OK
                'weight',
                'category_id',
                'height',
                'width',
                'length',
                'enable_variations',
                'unit_id', //ok
                'enable_delivery', //ok
                'is_activated', //ok
            ]
        );
        DB::beginTransaction();
        try {

            $data['enable_delivery'] = (isset($data['deliveryZones']) && count($data['deliveryZones']) > 0);
            $data['model_id'] = $request->input('model_id', null);
            $request->validate([
                'outstanding_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp' // tamaño máximo 2MB
            ]);

            // Usar el helper para subir la imagen y obtener la ruta
            $imagePath = upload_image($request->file('outstanding_image'));
            $data['outstanding_image'] =  $imagePath;

            // Convertir is_activated a un valor entero (1 o 0)
            $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
            $data['enable_stock'] = isset($data['enable_stock']) && $data['enable_stock'] == 'on' ? 1 : 0;
            $data['enable_reservation'] = isset($data['enable_reservation']) && $data['enable_reservation'] == 'on' ? 1 : 0;
            if ($data['sale_price'] === '') {
                unset($data['sale_price']); // Esto hará que el valor sea nulo en la base de datos
            }
            if ($data['discounted_price'] === '') {
                unset($data['discounted_price']); // Esto hará que el valor sea nulo en la base de datos
            }
            if ($data['model_id'] === '') {
                unset($data['model_id']); // Esto hará que el valor sea nulo en la base de datos
            }
            if ($data['start_date_discounted_price'] === '') {
                unset($data['start_date_discounted_price    ']); // Esto hará que el valor sea nulo en la base de datos
            }
            if (empty($data['start_date_discounted_price'])) {
                unset($data['start_date_discounted_price']);
            }
            if (empty($data['end_date_discounted_price'])) {
                unset($data['end_date_discounted_price']);
            }
            if ($data['purchase_price'] === '') {
                unset($data['purchase_price']); // Esto hará que el valor sea nulo en la base de datos
            }
            if (empty($data['expiration_date'])) {
                unset($data['expiration_date']);
            }
            if ($data['expiry_period'] === '') {
                unset($data['expiry_period']);
            }

            // Verificar las deliveryZones

            // Crea el producto
            $product = Product::create($data);

            if ($request->has('deliveryZones') && count($request->input('deliveryZones')) > 0) {
                $data['enable_delivery'] = true; // Hay delivery zones, habilitamos la entrega
                $product->deliveryZones()->attach($request->input('deliveryZones'));
            } else {
                $data['enable_delivery'] = false; // No hay delivery zones, deshabilitamos la entrega
            }



            // Manejo de categorías
            $product->categories()->attach($data['category_id']);

            // Manejo de tags (opcional)
            if (!empty($request->tag_id)) {
                $tags = explode(',', $request->tag_id);
                // Crear las etiquetas en un solo paso
                $tagIds = [];
                foreach ($tags as $tag) {
                    $tagCreated = Tag::firstOrCreate(['name' => trim($tag)]);
                    $tagIds[] = $tagCreated->id; // Guardar el ID de la etiqueta creada o existente
                }                // Asociar las etiquetas al producto
                $product->tags()->attach($tagIds);
            }

            Stock::create([
                'warehouse_id' => null,
                'quantity_available' => $request["quantity_available"],
                'minimum_quantity' => $request["minimum_quantity"],
                'maximum_quantity' => $request["maximum_quantity"],
                'product_id' => $product->id,
            ]);


            if (isset($data['terms_id'])) {
                // Convertimos la cadena en un array (por ejemplo, "5,6,7" a [5, 6, 7])
                $termsIds = explode(',', $data['terms_id']);

                // Asegúrate de que los IDs son enteros y eliminar valores vacíos
                $termsIds = array_filter(array_map('intval', $termsIds));

                // Luego puedes adjuntarlos a la relación
                $product->terms()->attach($termsIds);
            }
            DB::commit();
            return Redirect::route('products.index')
                ->with('success', 'Producto ' . __('validation.attributes.successfully_created'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.create')->withErrors(['error' => 'Error al crear el producto.' . $e]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $product = Product::find($id);
        $productCategories = Product::with('categories')->findOrFail($id);
        $productTerms = Product::with(['terms.attribute'])->findOrFail($id);
        // Obtener la cantidad de productos en la primera categoría del producto (si el producto tiene varias categorías)
        $categoryCounts = $product->categories->map(function ($category) {
            return [
                'id' => $category->id,
                'category' => $category->name,
                'product_count' => $category->products()->count(), // Se refiere a la relación del modelo Category
            ];
        });
        $groupedTerms = [];

        foreach ($productTerms->terms as $term) {
            $attributeName = optional($term->attribute)->name; // Asegúrate de que 'name' es el campo correcto en tu modelo

            if ($attributeName) {
                // Inicializa el array si no existe
                if (!isset($groupedTerms[$attributeName])) {
                    $groupedTerms[$attributeName] = [];
                }

                // Agrega el término al grupo
                $groupedTerms[$attributeName][] = $term->name; // Asegúrate de que 'name' es el campo correcto
            }
        }
        return view('product.show', compact('product', 'categoryCounts', 'groupedTerms'));
    }
    public function showList($id): View
    {

        $product = Product::find($id);
        $productCategories = Product::with('categories')->findOrFail($id);
        $productTerms = Product::with(['terms.attribute'])->findOrFail($id);

        // Obtener la cantidad de productos en la primera categoría del producto (si el producto tiene varias categorías)
        $categoryCounts = $product->categories->map(function ($category) {
            return [
                'id' => $category->id,
                'category' => $category->name,
                'product_count' => $category->products()->count(), // Se refiere a la relación del modelo Category
            ];
        });



        // Agrupar términos por atributo
        $groupedTerms = [];

        foreach ($productTerms->terms as $term) {
            $attributeName = optional($term->attribute)->name; // Asegúrate de que 'name' es el campo correcto en tu modelo

            if ($attributeName) {
                // Inicializa el array si no existe
                if (!isset($groupedTerms[$attributeName])) {
                    $groupedTerms[$attributeName] = [];
                }

                // Agrega el término al grupo
                $groupedTerms[$attributeName][] = $term->name; // Asegúrate de que 'name' es el campo correcto
            }
        }
        return view('product.show-list', compact('product', 'categoryCounts', 'groupedTerms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {

        $product = Product::find($id);
        $attributes =  AttributesModel::allActivated();
        $categories = ProductCategory::allActivated();
        $brands = Brand::allActivated();
        $deliveryZones = DeliveryZone::allActivated();
        $units = Unit::allActivated();

        return view('product.edit', compact('product', 'units', 'categories', 'attributes', 'brands', 'deliveryZones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        // Validación de los datos de entrada
        $request->validate([
            'outstanding_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Tamaño máximo 2MB
            // Agrega aquí las demás reglas de validación según sea necesario
        ]);

        // Cargar el producto que se va a actualizar
        $product = Product::findOrFail($product->id);

        $data = $request->only(
            [
                'name', //OK
                'sku', //OK
                'sale_price', //OK
                'discounted_price', //OK
                'start_date_discounted_price', //OK
                'end_date_discounted_price', //OK
                'quantity_available', //OK
                'minimum_quantity', //OK
                'maximum_quantity',
                'purchase_price', //OK
                'expiration_date', //OK
                'expiry_period_type', //ok
                'expiry_period', //ok
                'outstanding_image',
                'description', //OK
                'description_small', //OK
                'purchase_price',      //OK
                'enable_stock', //OK
                'brand_id', //ok
                'terms_id', //ok
                'enable_reservation', //ok
                'deliveryZones', //ok
                'tag_id', //OK
                'weight',
                'category_id',
                'height',
                'width',
                'length',
                'enable_variations',
                'unit_id', //ok
                'enable_delivery', //ok
                'is_activated', //ok
            ]
        );
        DB::beginTransaction();
        try {

            $data['enable_delivery'] = (isset($data['deliveryZones']) && count($data['deliveryZones']) > 0);
            $data['model_id'] = $request->input('model_id', null);
            $request->validate([
                'outstanding_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp' // tamaño máximo 2MB
            ]);

           
            if ($request->outstanding_image != null) { // Usar el helper para subir la imagen y obtener la ruta
                $imagePath = upload_image($request->file('outstanding_image'));
                $data['outstanding_image'] =  $imagePath;
            }


            // Convertir is_activated a un valor entero (1 o 0)
            $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
            $data['enable_stock'] = isset($data['enable_stock']) && $data['enable_stock'] == 'on' ? 1 : 0;
            $data['enable_reservation'] = isset($data['enable_reservation']) && $data['enable_reservation'] == 'on' ? 1 : 0;
            if ($data['sale_price'] === '') {
                unset($data['sale_price']); // Esto hará que el valor sea nulo en la base de datos
            }
            if ($data['discounted_price'] === '') {
                unset($data['discounted_price']); // Esto hará que el valor sea nulo en la base de datos
            }
            if ($data['model_id'] === '') {
                unset($data['model_id']); // Esto hará que el valor sea nulo en la base de datos
            }
            if ($data['start_date_discounted_price'] === '') {
                unset($data['start_date_discounted_price    ']); // Esto hará que el valor sea nulo en la base de datos
            }
            if (empty($data['start_date_discounted_price'])) {
                unset($data['start_date_discounted_price']);
            }
            if (empty($data['end_date_discounted_price'])) {
                unset($data['end_date_discounted_price']);
            }
            if ($data['purchase_price'] === '') {
                unset($data['purchase_price']); // Esto hará que el valor sea nulo en la base de datos
            }
            if (empty($data['expiration_date'])) {
                unset($data['expiration_date']);
            }
            if ($data['expiry_period'] === '') {
                unset($data['expiry_period']);
            }

            // Actualizar los datos en el modelo
            $product->update($data);

            // Manejo de categorías
            $product->categories()->sync([$data['category_id']]);

            if (!empty($request->tag_id)) {
                $product->tags()->detach();
                $tags = explode(',', $request->tag_id);
                // Crear las etiquetas en un solo paso
                $tagIds = [];
                foreach ($tags as $tag) {
                    $tagCreated = Tag::firstOrCreate(['name' => trim($tag)]);
                    $tagIds[] = $tagCreated->id; // Guardar el ID de la etiqueta creada o existente
                }                // Asociar las etiquetas al producto
                $product->tags()->attach($tagIds);
            }
            $stock = $product->stocks->first();

            $stock->quantity_available = $data["quantity_available"];
            $stock->minimum_quantity = $data["minimum_quantity"];
            $stock->maximum_quantity = $data["maximum_quantity"];
            $stock->save();

            if (isset($data['terms_id'])) {
                // Convertimos la cadena en un array (por ejemplo, "5,6,7" a [5, 6, 7])
                $termsIds = explode(',', $data['terms_id']);

                // Asegúrate de que los IDs son enteros y eliminar valores vacíos
                $termsIds = array_filter(array_map('intval', $termsIds));

                // Luego puedes adjuntarlos a la relación
                $product->terms()->sync($termsIds);
            }

            DB::commit();
            return Redirect::route('products.index')->with('success', 'Producto ' . __('validation.attributes.successfully_updated'));
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::route('products.index')->with('error', 'Producto ' . __('Error al actualizar el producto'));
        }
    }

    public function destroy($id): RedirectResponse
    {
        Product::find($id)->delete();

        return Redirect::route('products.index')
            ->with('success', 'Producto ' .  __('validation.attributes.successfully_removed'));
    }
}
