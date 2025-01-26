<?php

namespace App\Http\Controllers;

use App\Services\UnitBaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnitBaseController extends Controller
{

    protected $unitBaseService;

    public function __construct(UnitBaseService $unitBaseService)
    {
        $this->unitBaseService = $unitBaseService;
    }
    public function index()
    {
        $units = $this->unitBaseService->getUnitsBase();
        $units  = $units["data"];
        return view('admin.unitBase.index', compact('units'));
    }



    public function store(Request $request)
    {
        /* The code snippet you provided is from a PHP Laravel controller `CategoryController`. Let's
       break down the code: */
        $data = $request->only(['name', 'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $unitBase = $this->unitBaseService->createUnitBase($data);
        return $this->index();
    }

    public function show($id)
    {
        // Obtiene la unidad base por ID
        $unitBase = $this->unitBaseService->showUnitBase($id);
        // Devuelve la unidad base como respuesta JSON
        return response()->json($unitBase);
    }
    public function delete($id)
    {
        // Obtiene la unidad base por ID
        $unitBase = $this->unitBaseService->deleteUnitBase($id);
        // Devuelve la unidad base como respuesta JSON
        return response()->json($unitBase);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name','is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;

        $unit = $this->unitBaseService->updateUnitBase($id, $data);
        // Devuelve la unidad actualizada como respuesta JSON o redirige a la lista

        return  $this->index();
    }
}
