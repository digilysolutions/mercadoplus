<?php

namespace App\Http\Controllers;

use App\Models\ProductProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductProductCategoryRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productProductCategories = ProductProductCategory::all();

        return view('product-product-category.index', compact('productProductCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productProductCategory = new ProductProductCategory();

        return view('product-product-category.create', compact('productProductCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductProductCategoryRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        ProductProductCategory::create($data);

        return Redirect::route('product-product-categories.index')
            ->with('success', 'ProductProductCategory '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productProductCategory = ProductProductCategory::find($id);

        return view('product-product-category.show', compact('productProductCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productProductCategory = ProductProductCategory::find($id);

        return view('product-product-category.edit', compact('productProductCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductProductCategoryRequest $request, ProductProductCategory $productProductCategory): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $productProductCategory->update($data);

        return Redirect::route('product-product-categories.index')
            ->with('success', 'ProductProductCategory '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        ProductProductCategory::find($id)->delete();

        return Redirect::route('product-product-categories.index')
            ->with('success', 'ProductProductCategory '.  __('validation.attributes.successfully_removed'));
    }
}
