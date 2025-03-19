<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TermRequest;
use App\Models\AttributesModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $terms = Term::all();

        return view('term.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $term = new Term();
        $attributes = AttributesModel::allActivated();
        return view('term.create', compact('term','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TermRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        Term::create($data);

        return Redirect::route('terms.index')
            ->with('success', 'Term ' . __('validation.attributes.successfully_created'));
    }
    public function attribute_terms($id)
    {
        // Obtiene todos los  terminos de un atributo por ID
        $terms = Term::where('attribute_id', $id)->get();        
        $attributeId =  $terms->attribute_id;    
        $terms = $terms->terms;  
        $attributes = AttributesModel::allActivated();
     
        //$attribute_id= $terms['data']['attribute_id'];

        return view('admin.terms.attribute-terms', compact('terms', 'attributeId', 'attributes'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $term = Term::find($id);

        return view('term.show', compact('term'));
    }
    public function findByAttributeId(int $attributeId)
    {
        // Obtén los términos relacionados con el attributeId
        $terms = Term::where('attribute_id', $attributeId)->get();

        // Retorna los términos como JSON
        return response()->json(['terms' => $terms]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {  $attributes = AttributesModel::allActivated();
        $term = Term::find($id);

        return view('term.edit', compact('term','attributes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TermRequest $request, Term $term): RedirectResponse
    {
        $data = $request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $term->update($data);

        return Redirect::route('terms.index')
            ->with('success', 'Term ' . __('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Term::find($id)->delete();

        return Redirect::route('terms.index')
            ->with('success', 'Term ' .  __('validation.attributes.successfully_removed'));
    }
}
