<?php

namespace App\Http\Controllers;

use App\Models\ModelProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ModelProductRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ModelProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $modelProducts = ModelProduct::all();

        return view('model-product.index', compact('modelProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $modelProduct = new ModelProduct();
        $brands=  Brand::allActivated();

        return view('model-product.create', compact('modelProduct','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModelProductRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_activated'] = $request->input('is_activated') === 'on' ? 1 : 0;
        ModelProduct::create($data);

        return Redirect::route('model-products.index')
            ->with('success', __('Model') .__('validation.attributes.successfully_created'));
    }
    public function addModel(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id'
        ]);

        // Crear un nuevo modelo usando los datos proporcionados
        $modelProduct = ModelProduct::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id
        ]);

        // Retornar una respuesta JSON con los datos del modelo creado
        return response()->json([
            'model' => [
                'data' => $modelProduct
            ]
        ], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $modelProduct = ModelProduct::find($id);

        return view('model-product.show', compact('modelProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $modelProduct = ModelProduct::find($id);
        $brands=  Brand::allActivated();
        return view('model-product.edit', compact('modelProduct','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModelProductRequest $request, ModelProduct $modelProduct): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $modelProduct->update($data);

        return Redirect::route('model-products.index')
            ->with('success', __('Model').__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        ModelProduct::find($id)->delete();

        return Redirect::route('model-products.index')
            ->with('success', __('Model').  __('validation.attributes.successfully_removed'));
    }
}
