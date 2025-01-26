<?php

namespace App\Http\Controllers;



use App\Services\AttributeServices;
use Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected $attributeService;

    public function __construct(AttributeServices $attributeService)
    {
        $this->attributeService = $attributeService;
    }
    public function index()
    {
        $attributes = $this->attributeService->getAttributes();
        $attributes  = $attributes["data"];
        return view('admin.attribute.index', compact('attributes'));
    }

    public function store(Request $request)
    {
        /* The code snippet you provided is from a PHP Laravel controller `CategoryController`. Let's
       break down the code: */
        $data = $request->only(['name', 'description', 'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $this->attributeService->createAttribute($data);
        return $this->index();
    }

    public function show($id)
    {
        // Obtiene el atributo por ID
        $brand = $this->attributeService->showAttribute($id);
        // Devuelve el atributo como respuesta JSON
        return response()->json($brand);
    }
    public function delete($id)
    {
        // Obtiene la marca por ID
        $brand = $this->attributeService->deleteAttribute($id);
        // Devuelve el atributo como respuesta JSON
        return response()->json($brand);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name', 'description', 'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
     
        $this->attributeService->updateAttribute($id, $data);
        // Devuelve el attribute actualizada como respuesta JSON o redirige a la lista

        return  $this->index();
    }
}
