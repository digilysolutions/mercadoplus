<?php

namespace App\Http\Controllers;

use App\Models\ProductDeliveryZone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductDeliveryZoneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductDeliveryZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productDeliveryZones = ProductDeliveryZone::all();

        return view('product-delivery-zone.index', compact('productDeliveryZones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productDeliveryZone = new ProductDeliveryZone();

        return view('product-delivery-zone.create', compact('productDeliveryZone'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductDeliveryZoneRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        ProductDeliveryZone::create($data);

        return Redirect::route('product-delivery-zones.index')
            ->with('success', 'ProductDeliveryZone '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productDeliveryZone = ProductDeliveryZone::find($id);

        return view('product-delivery-zone.show', compact('productDeliveryZone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productDeliveryZone = ProductDeliveryZone::find($id);

        return view('product-delivery-zone.edit', compact('productDeliveryZone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductDeliveryZoneRequest $request, ProductDeliveryZone $productDeliveryZone): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $productDeliveryZone->update($data);

        return Redirect::route('product-delivery-zones.index')
            ->with('success', 'ProductDeliveryZone '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        ProductDeliveryZone::find($id)->delete();

        return Redirect::route('product-delivery-zones.index')
            ->with('success', 'ProductDeliveryZone '.  __('validation.attributes.successfully_removed'));
    }
}
