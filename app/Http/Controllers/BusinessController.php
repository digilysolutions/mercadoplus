<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\BusinessService;
use App\Services\ReviewService;
use App\Services\CountryCurrencyService;
use App\Services\CurrencyService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class BusinessController extends Controller
{
    protected $businessService;
    protected $countryCurrencyService;
    protected $categoryService;
    protected $currencyService;
    protected $reviewService;
    protected $productService;
   

    public function __construct(ProductService $productService, BusinessService $businessService, ReviewService $reviewService, CurrencyService $currencyService, CategoryService $categoryService, CountryCurrencyService $countryCurrencyService)
    {
        $this->countryCurrencyService = $countryCurrencyService;
        $this->businessService = $businessService;
        $this->categoryService = $categoryService;
        $this->currencyService = $currencyService;
        $this->reviewService = $reviewService;
        $this->productService = $productService;
          
    }
    public function index()
    {
        $business = $this->businessService->getBusiness();
        $business  = $business["data"][0];
        $countries_currencies = $this->countryCurrencyService->getCountryCurrency();
        $countries_currencies  = $countries_currencies["data"];
        $categories = $this->categoryService->getCategories();
        $categories  = $categories["data"];
        $employees = $business['employees'];
      
        $currencies = $this->currencyService->getCurrencies();
        $currencies  = $currencies["data"];
        $reviews = $this->reviewService->getReviews();
        $reviews  = collect($reviews["data"]);

        $products = $this->productService->getProducts();
        $products  = collect($products["data"]); 
        
       
        return view('admin.business.index', compact('products','business','reviews', 'countries_currencies', 'categories', 'employees', 'currencies'));
    }

    public function store(Request $request)
    {
        /* The code snippet you provided is from a PHP Laravel controller `CategoryController`. Let's
       break down the code: */
        $data = $request->only(['name', 'logo','description', 'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp' // tamaño máximo 2MB
        ]);

        // Usar el helper para subir la imagen y obtener la ruta
        $imagePath = upload_image($request->file('logo'));

        $data['logo'] =  $imagePath;
        $this->businessService->createBusiness($data);
        return $this->index();
    }

    public function show($id)
    {
        // Obtiene la marca por ID
        $brand = $this->businessService->showBusiness($id);
        // Devuelve la marca como respuesta JSON
        return response()->json($brand);
    }
    public function delete($id)
    {
        // Obtiene la marca por ID
        $brand = $this->businessService->deleteBusiness($id);
        // Devuelve la marca como respuesta JSON
        return response()->json($brand);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(
            [
                'name',
                'description',
                'industry',
                'website',
                'country_name',
                'contact_location_city',
                'zip_code',
                'mobile',
                'logo',
                'contact_email',
                'phone',
                'address',
                'landmark',
                'location_description',
                'location_name',
                'is_activated'
            ]
        );
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
         // Validar la solicitud para asegurarnos de que haya un archivo de imagen
         if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' // tamaño máximo 2MB
            ]);

            // Usar el helper para subir la imagen y obtener la ruta
            $imagePath = upload_image($request->file('logo'));
            $data['logo'] = $imagePath; // Se añade la ruta de la nueva imagen
        } else {
            // Si no hay nueva imagen, obtener la categoría actual para mantener su path_image
            $business_show = $this->businessService->showBusiness($id);

            // Verificar que la respuesta sea exitosa y que contenga datos
            if ($business_show['success'] && isset($business_show['data'])) {
                // Asignar el valor de path_image a $data
                $data['logo'] = $business_show['data']['logo'];
            } else {
                // Manejar el caso donde la categoría no existe o hay un error en la respuesta
                return response()->json(['error' => 'Negocio no encontrada o error en la solicitud'], 404);
            }
        }
        $this->businessService->updateBusiness($id, $data);
        // Devuelve la marca actualizada como respuesta JSON o redirige a la lista
      
        return  $this->index();
    }
}
