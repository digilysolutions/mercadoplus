<?php

namespace App\Http\Controllers;

use App\Models\AttributeProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AttributeProductRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AttributeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $attributeProducts = AttributeProduct::all();

        return view('attribute-product.index', compact('attributeProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $attributeProduct = new AttributeProduct();

        return view('attribute-product.create', compact('attributeProduct'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributeProductRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        AttributeProduct::create($data);

        return Redirect::route('attribute-products.index')
            ->with('success', 'AttributeProduct '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $attributeProduct = AttributeProduct::find($id);

        return view('attribute-product.show', compact('attributeProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $attributeProduct = AttributeProduct::find($id);

        return view('attribute-product.edit', compact('attributeProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributeProductRequest $request, AttributeProduct $attributeProduct): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $attributeProduct->update($data);

        return Redirect::route('attribute-products.index')
            ->with('success', 'AttributeProduct '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        AttributeProduct::find($id)->delete();

        return Redirect::route('attribute-products.index')
            ->with('success', 'AttributeProduct '.  __('validation.attributes.successfully_removed'));
    }
}
