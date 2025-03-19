<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use App\Models\UnitBase;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $units = Unit::all();

        return view('unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $unit = new Unit();
        $unitsBase = UnitBase::allActivated();
        return view('unit.create', compact('unit','unitsBase'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        Unit::create($data);

        return Redirect::route('units.index')
            ->with('success', __('Unit') .__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $unit = Unit::find($id);

        return view('unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $unit = Unit::find($id);
        $unitsBase = UnitBase::allActivated();
        return view('unit.edit', compact('unit','unitsBase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitRequest $request, Unit $unit): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $unit->update($data);

        return Redirect::route('units.index')
            ->with('success', __('Unit') .__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Unit::find($id)->delete();

        return Redirect::route('units.index')
            ->with('success', __('Unit') .  __('validation.attributes.successfully_removed'));
    }
}
