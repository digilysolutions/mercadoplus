<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductImageRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productImages = ProductImage::all();

        return view('product-image.index', compact('productImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productImage = new ProductImage();

        return view('product-image.create', compact('productImage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductImageRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        ProductImage::create($data);

        return Redirect::route('product-images.index')
            ->with('success', 'ProductImage '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productImage = ProductImage::find($id);

        return view('product-image.show', compact('productImage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productImage = ProductImage::find($id);

        return view('product-image.edit', compact('productImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductImageRequest $request, ProductImage $productImage): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $productImage->update($data);

        return Redirect::route('product-images.index')
            ->with('success', 'ProductImage '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        ProductImage::find($id)->delete();

        return Redirect::route('product-images.index')
            ->with('success', 'ProductImage '.  __('validation.attributes.successfully_removed'));
    }
}
