<?php

namespace App\Http\Controllers;

use App\Services\AttributeServices;
use App\Services\TermService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TermsController extends Controller
{
    protected $termService;
    protected $attributeService;

    public function __construct(TermService $termService, AttributeServices $attributeService)
    {
        $this->termService = $termService;
        $this->attributeService = $attributeService;
    }
    public function index()
    {
        $data = $this->termService->getTerms();
        $terms = $data["data"];
        $data = $this->attributeService->getAttributes();
        $attributes = $data["data"];

        return view('admin.terms.index', compact('terms', 'attributes'));
    }
    public function store(Request $request)
    {
        $data = $request->only(['name', 'attribute_id', 'attributeId', 'is_activated']);
       

        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $this->termService->createTerm($data);
        if ($data['attributeId']) {
            $attributeId = $data['attributeId'];
            $terms = $this->termService->attribute_terms($attributeId);
            $terms = $terms['data']['terms'];
            $data = $this->attributeService->getAttributes();
            $attributes = $data["data"];
            return view('admin.terms.attribute-terms', compact('terms', 'attributeId', 'attributes'));
        }
        return $this->index();
    }

    public function attribute_terms($id)
    {
        // Obtiene todos los  terminos de un atributo por ID
        $terms = $this->termService->attribute_terms($id);
        $attributeId =  $terms['data']['attribute_id'];
        $terms = $terms['data']['terms'];
        $data = $this->attributeService->getAttributes();
        $attributes = $data["data"];

        //$attribute_id= $terms['data']['attribute_id'];

        return view('admin.terms.attribute-terms', compact('terms', 'attributeId', 'attributes'));
    }

    public function attribute_terms_json($id)
    {
        // Obtiene todos los términos de un atributo por ID
        $termsResponse = $this->termService->attribute_terms($id);

        if (!isset($termsResponse['data'])) {
            // Puedes manejar el caso de errores si no hay términos o datos
            return response()->json(['error' => 'Términos no encontrados o un error en el servicio'], 404);
        }
        $attributeId = $termsResponse['data']['attribute_id'];
        $terms = $termsResponse['data']['terms'];

        // Obtener atributos
        $data = $this->attributeService->getAttributes();
        $attributes = $data["data"];
        
        // Crear la respuesta JSON con todos los datos necesarios
        return response()->json([
            'terms' => $terms,
            'attributeId' => $attributeId,
            'attributes' => $attributes,
        ]);
    }

    public function show($id)
    {
        // Obtiene la etiqueta por ID
        $tag = $this->termService->showTerm($id);
        // Devuelve el termino como respuesta JSON
        return response()->json($tag);
    }
    public function delete($id)
    {        // Obtiene el termino  por ID
        $term = $this->termService->deleteTerm($id);
        // Devuelve el termino  como respuesta JSON
        return response()->json($term);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name', 'attribute_id', 'attributeId', 'is_activated']);

        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;

        $term = $this->termService->updateTerm($id, $data);
        // Devuelve el termino actualizada como respuesta JSON o redirige a la lista        
        if ($data['attributeId']) {
            $attributeId = $data['attributeId'];
            $terms = $this->termService->attribute_terms($attributeId);
            $terms = $terms['data']['terms'];
            $data = $this->attributeService->getAttributes();
            $attributes = $data["data"];
            return view('admin.terms.attribute-terms', compact('terms', 'attributeId', 'attributes'));
        }
        return  $this->index();
    }
}
