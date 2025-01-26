<?php

namespace App\Http\Controllers;

use App\Services\UnitBaseService;
use App\Services\UnitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnitController extends Controller
{
    protected $unitService;
    protected $unitaBaseService;

    public function __construct(UnitService $unitService,UnitBaseService $unitaBaseService)
    {
        $this->unitService = $unitService;
        $this->unitaBaseService = $unitaBaseService;
    }
    public function index()
    {
        $data_units = $this->unitService->getUnits();
        
        $units  = $data_units["data"];
        $data_units_base = $this->unitaBaseService->getUnitsBase();
        $units_base  = $data_units_base["data"];
        return view('admin.unit.index', compact('units','units_base'));
    }
    public function store(Request $request)
    {
        $data = $request->only(['name', 'shortname', 'unitbase_id', 'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $unit = $this->unitService->createUnit($data);
        return $this->index();
    }

    public function show($id)
    {
        
        // Obtiene la unidad por ID
        $unit = $this->unitService->showUnit($id);
        // Devuelve la unidad base como respuesta JSON
        return response()->json($unit);
    }
    public function delete($id)
    {        // Obtiene la unidad por ID
        $unitBase = $this->unitService->deleteUnit($id);
        // Devuelve la unidad como respuesta JSON
        return response()->json($unitBase);
    }

    public function update(Request $request, $id)
    {
      
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name', 'shortname', 'unitbase_id', 'is_activated']);
       
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0; 
        
        $unit = $this->unitService->updateUnit($id, $data);
        // Devuelve la unidad actualizada como respuesta JSON o redirige a la lista        
        return  $this->index();
    }
}
