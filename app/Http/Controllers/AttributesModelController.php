<?php

namespace App\Http\Controllers;

use App\Models\AttributesModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AttributesModelRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AttributesModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $attributesModels = AttributesModel::all();

        return view('attributes-model.index', compact('attributesModels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $attributesModel = new AttributesModel();

        return view('attributes-model.create', compact('attributesModel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributesModelRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        AttributesModel::create($data);

        return Redirect::route('attributes-models.index')
            ->with('success', 'Atributo '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $attributesModel = AttributesModel::find($id);

        return view('attributes-model.show', compact('attributesModel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $attributesModel = AttributesModel::find($id);

        return view('attributes-model.edit', compact('attributesModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributesModelRequest $request, AttributesModel $attributesModel): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $attributesModel->update($data);

        return Redirect::route('attributes-models.index')
            ->with('success', 'Atributo '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        AttributesModel::find($id)->delete();

        return Redirect::route('attributes-models.index')
            ->with('success', 'Atributo '.  __('validation.attributes.successfully_removed'));
    }
}
