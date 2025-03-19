<?php

namespace App\Http\Controllers;

use App\Models\DeliveryZone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DeliveryZoneRequest;
use App\Models\Location;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DeliveryZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $deliveryZones = DeliveryZone::all();

        return view('delivery-zone.index', compact('deliveryZones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $deliveryZone = new DeliveryZone();
        $locations = Location::allActivated();
        return view('delivery-zone.create', compact('deliveryZone','locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryZoneRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        DeliveryZone::create($data);

        return Redirect::route('delivery-zones.index')
            ->with('success', __('Delivery Zones') . __('validation.attributes.successfully_created'));
    }


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $deliveryZone = DeliveryZone::find($id);

        return view('delivery-zone.show', compact('deliveryZone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $deliveryZone = DeliveryZone::find($id);
        $locations = Location::allActivated();
        return view('delivery-zone.edit', compact('deliveryZone','locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryZoneRequest $request, DeliveryZone $deliveryZone): RedirectResponse
    {
        $data = $request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $deliveryZone->update($data);

        return Redirect::route('delivery-zones.index')
            ->with('success', __('Delivery Zones') . __('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        DeliveryZone::find($id)->delete();

        return Redirect::route('delivery-zones.index')
            ->with('success', __('Delivery Zones') .  __('validation.attributes.successfully_removed'));
    }
}
