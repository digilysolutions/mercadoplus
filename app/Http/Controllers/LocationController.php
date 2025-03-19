<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LocationRequest;
use App\Models\Municipality;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $locations = Location::all();

        return view('location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $location = new Location();
        $municipalities =  Municipality::allActivated();
        return view('location.create', compact('location','municipalities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        Location::create($data);

        return Redirect::route('locations.index')
            ->with('success', __('Location').__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $location = Location::find($id);

        return view('location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $location = Location::find($id);
        $municipalities =  Municipality::allActivated();
        return view('location.edit', compact('location','municipalities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, Location $location): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $location->update($data);

        return Redirect::route('locations.index')
            ->with('success', __('Location').__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Location::find($id)->delete();

        return Redirect::route('locations.index')
            ->with('success', __('Location').  __('validation.attributes.successfully_removed'));
    }
}
