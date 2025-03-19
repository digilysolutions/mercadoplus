<?php

namespace App\Http\Controllers;

use App\Models\ProductsVariation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsVariationRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductsVariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productsVariations = ProductsVariation::all();

        return view('products-variation.index', compact('productsVariations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productsVariation = new ProductsVariation();

        return view('products-variation.create', compact('productsVariation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsVariationRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        ProductsVariation::create($data);

        return Redirect::route('products-variations.index')
            ->with('success', 'ProductsVariation '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productsVariation = ProductsVariation::find($id);

        return view('products-variation.show', compact('productsVariation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productsVariation = ProductsVariation::find($id);

        return view('products-variation.edit', compact('productsVariation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsVariationRequest $request, ProductsVariation $productsVariation): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $productsVariation->update($data);

        return Redirect::route('products-variations.index')
            ->with('success', 'ProductsVariation '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        ProductsVariation::find($id)->delete();

        return Redirect::route('products-variations.index')
            ->with('success', 'ProductsVariation '.  __('validation.attributes.successfully_removed'));
    }
}
