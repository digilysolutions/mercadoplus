<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\CurrencyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $currencyService;

    public function __construct(CategoryService $categoryService,CurrencyService $currencyService)
    {
        $this->categoryService = $categoryService;
        $this->currencyService = $currencyService;
    }

    public function index()
    {
        $categories = $this->categoryService->getCategories();
        $currencies = $this->currencyService->getCurrencies();

        $categories  = $categories["data"];
        $currencies  = $currencies["data"];
        return view('admin.categories.index', compact('categories','currencies'));
    }
    
    public function storeCategoryName(Request $request)
    {        
        $data = $request->only(['name', 'path_image' ]);  
        $request->validate([
            'path_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp' // tamaño máximo 2MB
        ]);

        // Usar el helper para subir la imagen y obtener la ruta
        $imagePath = upload_image($request->file('path_image'));

        $data['path_image'] =  $imagePath;
        $data['is_activated'] =  false;
        $category = $this->categoryService->createCategory($data);
        return response()->json(['success' => true, 'category' => $category]);
    }

    public function store(Request $request)
    {

        /* The code snippet you provided is from a PHP Laravel controller `CategoryController`. Let's
       break down the code: */
        $data = $request->only(['name', 'description', 'path_image', 'is_activated','code_currency_default','is_exchange_rate']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;        // Validar la solicitud para asegurarnos de que haya un archivo de imagen
        $request->validate([
            'path_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp' // tamaño máximo 2MB
        ]);

        // Usar el helper para subir la imagen y obtener la ruta
        $imagePath = upload_image($request->file('path_image'));

        $data['path_image'] =  $imagePath;

        $category = $this->categoryService->createCategory($data);
        return $this->index();
        //return redirect()->route('admin.categories.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function show($id)
    {
        // Obtiene la categoría por ID
        $category = $this->categoryService->showCategory($id);
        // Devuelve la categoría como respuesta JSON
        return response()->json($category);
    }
    public function delete($id)
    {
        // Obtiene la categoría por ID
        $category = $this->categoryService->deleteCategory($id);
        // Devuelve la categoría como respuesta JSON
        return response()->json($category);
    }  

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name', 'description', 'path_image', 'is_activated','code_currency_default','is_exchange_rate']);       
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0; 

        // Validar la solicitud para asegurarnos de que haya un archivo de imagen
        if ($request->hasFile('path_image')) {
            $request->validate([
                'path_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' // tamaño máximo 2MB
            ]);

            // Usar el helper para subir la imagen y obtener la ruta
            $imagePath = upload_image($request->file('path_image'));
            $data['path_image'] = $imagePath; // Se añade la ruta de la nueva imagen
        } else {
            // Si no hay nueva imagen, obtener la categoría actual para mantener su path_image
            $currentCategory = $this->categoryService->showCategory($id);

            // Verificar que la respuesta sea exitosa y que contenga datos
            if ($currentCategory['success'] && isset($currentCategory['data'])) {
                // Asignar el valor de path_image a $data
                $data['path_image'] = $currentCategory['data']['path_image'];
            } else {
                // Manejar el caso donde la categoría no existe o hay un error en la respuesta
                return response()->json(['error' => 'Categoría no encontrada o error en la solicitud'], 404);
            }
        }
       
        $category = $this->categoryService->updateCategory($id, $data);
        // Devuelve la categoría actualizada como respuesta JSON o redirige a la lista
        //return response()->json($category); // o
        return  $this->index();
    }
}
