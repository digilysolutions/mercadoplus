<?php

namespace App\Http\Controllers;

use App\Models\ProductsCurrency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsCurrencyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductsCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productsCurrencies = ProductsCurrency::all();

        return view('products-currency.index', compact('productsCurrencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productsCurrency = new ProductsCurrency();

        return view('products-currency.create', compact('productsCurrency'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsCurrencyRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        ProductsCurrency::create($data);

        return Redirect::route('products-currencies.index')
            ->with('success', 'ProductsCurrency '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productsCurrency = ProductsCurrency::find($id);

        return view('products-currency.show', compact('productsCurrency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productsCurrency = ProductsCurrency::find($id);

        return view('products-currency.edit', compact('productsCurrency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsCurrencyRequest $request, ProductsCurrency $productsCurrency): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $productsCurrency->update($data);

        return Redirect::route('products-currencies.index')
            ->with('success', 'ProductsCurrency '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        ProductsCurrency::find($id)->delete();

        return Redirect::route('products-currencies.index')
            ->with('success', 'ProductsCurrency '.  __('validation.attributes.successfully_removed'));
    }
}
