<?php

namespace App\Http\Controllers;

use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }
    public function index()
    {
        $locations = $this->locationService->getLocations();
        $locations  = $locations["data"];
        return view('admin.locations.index', compact('locations'));
    }

    public function store(Request $request)
    {
        /* The code snippet you provided is from a PHP Laravel controller `CategoryController`. Let's
       break down the code: */
        $data = $request->only(
            [
                'name',
                'description',
                'zip_code',
                'city',
                'address',
                'municipality_id',
                'landmark',
                'is_activated',
                'country_name',
                'province_name',
                'municipality_name'
            ]
        );
        $data['city'] = "Isla de la Juventud";
        $data['municipality_name'] = "Isla de la Juventud";
        $data['province_name'] = 'Municipio Especial Isla de la Juventud';
        $data['country_name'] = "Cuba";    
      
        $data['municipality_id'] = 1;
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
      

        $this->locationService->createLocations($data);
        return $this->index();
    }

    public function show($id)
    {
        // Obtiene la localidad por ID
        $location = $this->locationService->showLocations($id);
        // Devuelve la localidad como respuesta JSON
        return response()->json($location);
    }
    public function delete($id)
    {
        // Obtiene la localidad por ID
        $location = $this->locationService->deleteLocations($id);
        // Devuelve localidad como respuesta JSON
        return response()->json($location);
    }

    public function update(Request $request, $id)
    {
        
        $data = $request->only(
            [
                'name',
                'description',
                'zip_code',
                'city',
                'address',
                'municipality_id',
                'landmark',
                'is_activated',
                'country_name',
                'province_name',
                'municipality_name'
            ]
        );
        $data['city'] = "Isla de la Juventud";
        $data['municipality_name'] = "Isla de la Juventud";
        $data['province_name'] = 'Municipio Especial Isla de la Juventud';
        $data['country_name'] = "Cuba";

        $data['municipality_id'] = 1;
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;

        $this->locationService->updateLocations($id, $data);

        // Devuelve localidad actualizada como respuesta JSON o redirige a la lista

        return  $this->index();
    }
}
