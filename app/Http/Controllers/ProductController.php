<?php

namespace App\Http\Controllers;

use App\Services\AttributeServices;
use App\Services\BrandServices;
use App\Services\CategoryService;
use App\Services\DeliveryZonesService;
use App\Services\ProductService;
use App\Services\UnitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $productsService;
    protected $categoryService;
    protected $attributeService;
    protected $brandService;
    protected $deliveryZones;
    protected $unitService;
    public function __construct(UnitService $unitService, DeliveryZonesService $deliveryZones, BrandServices $brandService, AttributeServices $attributeService, CategoryService  $categoryService, ProductService $productsService)
    {
        $this->productsService = $productsService;
        $this->categoryService = $categoryService;
        $this->attributeService = $attributeService;
        $this->brandService = $brandService;
        $this->deliveryZones = $deliveryZones;
        $this->unitService = $unitService;
    }
    public function index()
    {
        $products = $this->productsService->getProducts();
        $products = $products['data'];

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        //Ubicacion
        /*  $locations = $this->locationService->getLocations();
        $locations  = $locations["data"];
        $businesses = $this->businessService->getBusiness();
        $businesses  = $businesses["data"];*/
        $attributes =  $this->attributeService->getAttributes();
        $attributes = $attributes['data'];
        $categories = $this->categoryService->getCategories();
        $categories = $categories['data'];
        $brands = $this->brandService->getBrands();
        $brands = $brands['data'];
        $deliveryZones = $this->deliveryZones->getDeliveryZones();
        $deliveryZones = $deliveryZones['data'];
        $units = $this->unitService->getUnits();
        $units = $units['data'];
        return view('admin.products.create-products', compact('units', 'categories', 'attributes', 'brands', 'deliveryZones')); // Muestra la vista 'people.create'
    }

    public function store(Request $request)
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
                'model_id', //ok
                'enable_reservation', //ok
                'deliveryZones', //ok
                'tag_id', //OK
                'weight',
                'height',
                'width',
                'length',
                'enable_variations',
                'unit_id', //ok
                'enable_delivery', //ok
                'is_activated', //ok
            ]
        );
        $data['enable_delivery'] = (isset($data['deliveryZones']) && count($data['deliveryZones']) > 0);

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
        $this->productsService->createProduct($data);
        return $this->index();
    }

    public function show($id)
    { 
        $data = $this->productsService->showProduct($id);
        $product = $data['product'];
        $averageRating = $data['averageRating'];
        $attributeTerms = $data['attributeTerms'];
        $currentPrice = $data['currentPrice'];

        // Devuelve el producto como respuesta JSON
        return view('admin.products.show', compact('product', 'averageRating', 'attributeTerms', 'currentPrice'));
    }
   
    public function delete($id)
    {        // Obtiene la puntacion por ID
        $product = $this->productsService->deleteProduct($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name',  'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;

        $product = $this->productsService->updateProduct($id, $data);
        // Devuelve el producto  actualizada como respuesta JSON o redirige a la lista        
        return  $this->index();
    }


    public function changeCurrency(Request $request)
    {
        $request->validate(['currency' => 'required|string']);
        $request->session()->put('currency', $request->currency);

        return redirect()->route('products.index');
    }
}
