<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tags = Tag::all();

        return view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tag = new Tag();

        return view('tag.create', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        Tag::create($data);

        return Redirect::route('tags.index')
            ->with('success', __('Tag').__('validation.attributes.successfully_created'));
    }

    public function addTags(Request $request)
    {

        DB::beginTransaction();

        try {
            // Verificar si 'name' es un arreglo
            $names = is_array($request->name) ? $request->name : [$request->name];
            $createdTags = []; // Array para almacenar las etiquetas creadas

            // Recorrer los nombres y crear etiquetas
            foreach ($names as $name) {
                $details = [
                    'name' => $name,
                    'is_activated'=>true,
                ];

                // Crear la etiqueta y almacenarla
                $tag = Tag::create($details);
                $createdTags[] = $tag; // Almacenar la etiqueta creada
            }

            DB::commit();

            // Retornar las etiquetas creadas como respuesta
            return response()->json([
                'data' => $createdTags,
                'message' => 'Etiquetas creadas exitosamente.'
            ], 201); // Código 201 para creación exitosa

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error al guardar las etiquetas.',
                'error' => $e->getMessage(),
            ], 500); // Código 500 para error de servidor
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tag = Tag::find($id);

        return view('tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tag = Tag::find($id);

        return view('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $tag->update($data);

        return Redirect::route('tags.index')
            ->with('success', __('Tag'). __('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Tag::find($id)->delete();

        return Redirect::route('tags.index')
            ->with('success', __('Tag').  __('validation.attributes.successfully_removed'));
    }
}
