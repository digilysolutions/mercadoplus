<?php

namespace App\Http\Controllers;

use App\Models\BusinessProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BusinessProductRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BusinessProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $businessProducts = BusinessProduct::all();

        return view('business-product.index', compact('businessProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $businessProduct = new BusinessProduct();

        return view('business-product.create', compact('businessProduct'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessProductRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        BusinessProduct::create($data);

        return Redirect::route('business-products.index')
            ->with('success', 'BusinessProduct '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $businessProduct = BusinessProduct::find($id);

        return view('business-product.show', compact('businessProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $businessProduct = BusinessProduct::find($id);

        return view('business-product.edit', compact('businessProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessProductRequest $request, BusinessProduct $businessProduct): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $businessProduct->update($data);

        return Redirect::route('business-products.index')
            ->with('success', 'BusinessProduct '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        BusinessProduct::find($id)->delete();

        return Redirect::route('business-products.index')
            ->with('success', 'BusinessProduct '.  __('validation.attributes.successfully_removed'));
    }
}
