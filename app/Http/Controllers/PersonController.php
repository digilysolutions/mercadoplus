<?php

namespace App\Http\Controllers;

use App\Services\BusinessService;
use App\Services\LocationService;
use App\Services\PersonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PersonController extends Controller
{
    protected $personService;
    protected $locationService;
    protected $businessService;
    public function __construct(PersonService $personService, LocationService $locationService, BusinessService $businessService)
    {
        $this->personService = $personService;
        $this->locationService = $locationService;
        $this->businessService = $businessService;
    }
    public function index()
    {
        $data = $this->personService->getPersons();
        $persons = $data["data"];
        return view('admin.persons.index', compact('persons'));
    }
    public function create()
    {
        //Ubicacion
        $locations = $this->locationService->getLocations();
        $locations  = $locations["data"];
        $businesses = $this->businessService->getBusiness();
        $businesses  = $businesses["data"];

        return view('admin.persons.create', compact('locations', 'businesses')); // Muestra la vista 'people.create'
    }
    public function store(Request $request)
    {
        $data = $request->only([
            'first_name',
            'middle_name',
            'last_name',
            'gender',
            'marital_status',
            'blood_group',
            'type',
            'mobile',
            'email',
            'alternate_number',
            'phone',
            'family_number',
            'location_name',
            'city',
            'address',
            'zip_code',
            'description',
            'landmark',
            'business_id',
            'person_statuses_message',
            'shippingAddress_name',
            'shippingAddress_city',
            'shippingAddress_address',
            'shippingAddress_zip_code',
            'shippingAddress_description',
            'shippingAddress_landmark',
            'path_image',
            'business_employee_id',
            'email_business',
            'jobTitle',
            'department',
            'municipality_id',
            'role',
            'salary'
        ]);
       

        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $data['municipality_id'] =1;

        if($request->has('path_image'))
        {
            $request->validate([
                'path_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp' // tamaño máximo 2MB
            ]);    
            // Usar el helper para subir la imagen y obtener la ruta
            $imagePath = upload_image($request->file('path_image'));
            $data['path_image'] =  $imagePath;
        }
     
        $this->personService->createPerson($data);
        return $this->index();
    }

    public function show($id)
    {
        // Obtiene la etiqueta por ID
        $tag = $this->personService->showPerson($id);


        // Devuelve la etiqueta como respuesta JSON
        return response()->json($tag);
    }
    public function delete($id)
    {        // Obtiene la ETQUETA por ID
        $tag = $this->personService->deletePerson($id);
        // Devuelve la etiqueta como respuesta JSON
        return response()->json($tag);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name',  'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $tag = $this->personService->updatePerson($id, $data);
        // Devuelve la etqiueta actualizada como respuesta JSON o redirige a la lista        
        return  $this->index();
    }
}
