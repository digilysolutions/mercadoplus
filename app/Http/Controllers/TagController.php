<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }
    public function index()
    {
        $data = $this->tagService->getTags();
        $tags = $data["data"];
        return view('admin.tags.index', compact('tags'));
    }
    public function store(Request $request)
    {            
        $this->storeNewTag($request);
        return $this->index();
    }
    function storeNewTag(Request $request)
    {
        $data =$request->only(['name', 'descriptions','is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $tags=$this->tagService->createTag($data);
        return  $tags;
    }

    public function show($id)
    {
        // Obtiene la etiqueta por ID
        $tag = $this->tagService->showTag($id);
        // Devuelve la etiqueta como respuesta JSON
        return response()->json($tag);
    }
    public function delete($id)
    {        // Obtiene la ETQUETA por ID
        $tag = $this->tagService->deleteTag($id);
        // Devuelve la etiqueta como respuesta JSON
        return response()->json($tag);
    }

    public function update(Request $request, $id)
    {
        // Obtener solo los datos relevantes del request
        $data = $request->only(['name', 'descriptions', 'is_activated']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;

        $tag = $this->tagService->updateTag($id, $data);
        // Devuelve la etqiueta actualizada como respuesta JSON o redirige a la lista        
        return  $this->index();
    }

    public function searchTags(Request $request)
    {    
        $tag = $this->tagService->searchTags($request);
        return $tag;
    }
    
}
