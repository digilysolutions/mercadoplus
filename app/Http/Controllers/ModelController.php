<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use App\Services\BrandServices;
use App\Services\ModelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ModelController extends Controller
{
    protected $modelService;
    protected $brandService;

    public function __construct(ModelService $modelService,BrandServices $brandService)
    {
        $this->modelService = $modelService;
        $this->brandService = $brandService;
    }
    public function index()
    {
        $data_model = $this->modelService->getModels();
        $models  = $data_model["data"];

        $brands = $this->brandService->getBrands();
        $brands  = $brands["data"];        
       
        return view('admin.models-brand.index', compact('models','brands'));
    }
    public function store(Request $request)
    {
        $data = $request->only(['name', 'description', 'year', 'characteristics',   'brand_id', 'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $this->modelService->createModels($data);
        return  $this->index();
    }
    public function addModelBrand(Request $request)
    {
        $data = $request->only(['name', 'brand_id' ]);  
        $model = $this->modelService->createModels($data);
        return response()->json(['success' => true, 'model' => $model]);
    }
    

    public function show($id)
    {

        // Obtiene el modelo por ID
        $unit = $this->modelService->showModels($id);
        // Devuelve el modelo como respuesta JSON
        return response()->json($unit);
    }
    public function delete($id)
    {        // Obtiene el modelo por ID
        $model = $this->modelService->deleteModels($id);
        // Devuelve el modelo como respuesta JSON
        return response()->json($model);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name', 'description', 'year', 'characteristics',   'brand_id', 'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;

        $this->modelService->updateModels($id, $data);
        // Devuelve el modelo  como respuesta JSON o redirige a la lista        
        return  $this->index();
    }
}
