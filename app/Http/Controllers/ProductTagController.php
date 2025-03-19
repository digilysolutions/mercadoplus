<?php

namespace App\Http\Controllers;

use App\Models\ProductTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductTagRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productTags = ProductTag::all();

        return view('product-tag.index', compact('productTags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productTag = new ProductTag();

        return view('product-tag.create', compact('productTag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductTagRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        ProductTag::create($data);

        return Redirect::route('product-tags.index')
            ->with('success', 'ProductTag '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productTag = ProductTag::find($id);

        return view('product-tag.show', compact('productTag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productTag = ProductTag::find($id);

        return view('product-tag.edit', compact('productTag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductTagRequest $request, ProductTag $productTag): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $productTag->update($data);

        return Redirect::route('product-tags.index')
            ->with('success', 'ProductTag '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        ProductTag::find($id)->delete();

        return Redirect::route('product-tags.index')
            ->with('success', 'ProductTag '.  __('validation.attributes.successfully_removed'));
    }
}
