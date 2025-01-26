<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use App\Services\BrandServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandServices $brandService)
    {
        $this->brandService = $brandService;
    }
    public function index()
    {
        $brands = $this->brandService->getBrands();
        $brands  = $brands["data"];
        return view('admin.brand.index', compact('brands'));
    }

    public function store(Request $request)
    {
        /* The code snippet you provided is from a PHP Laravel controller `CategoryController`. Let's
       break down the code: */
        $data = $request->only(['name', 'description', 'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $this->brandService->createBrand($data);
        return $this->index();
    }

    public function show($id)
    {
        // Obtiene la marca por ID
        $brand = $this->brandService->showBrand($id);
        // Devuelve la marca como respuesta JSON
        return response()->json($brand);
    }
    public function delete($id)
    {
        // Obtiene la marca por ID
        $brand = $this->brandService->deleteBrand($id);
        // Devuelve la marca como respuesta JSON
        return response()->json($brand);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name', 'description', 'is_activated']);
               // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;   
       
        $this->brandService->updateBrand($id, $data);
        // Devuelve la marca actualizada como respuesta JSON o redirige a la lista

        return  $this->index();
    }
}
