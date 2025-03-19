<?php

namespace App\Http\Controllers;

use App\Models\ProductTerm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductTermRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductTermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productTerms = ProductTerm::all();

        return view('product-term.index', compact('productTerms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productTerm = new ProductTerm();

        return view('product-term.create', compact('productTerm'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductTermRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        ProductTerm::create($data);

        return Redirect::route('product-terms.index')
            ->with('success', 'ProductTerm '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productTerm = ProductTerm::find($id);

        return view('product-term.show', compact('productTerm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productTerm = ProductTerm::find($id);

        return view('product-term.edit', compact('productTerm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductTermRequest $request, ProductTerm $productTerm): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $productTerm->update($data);

        return Redirect::route('product-terms.index')
            ->with('success', 'ProductTerm '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        ProductTerm::find($id)->delete();

        return Redirect::route('product-terms.index')
            ->with('success', 'ProductTerm '.  __('validation.attributes.successfully_removed'));
    }
}
