<?php

namespace App\Http\Controllers;

use App\Models\UnitBase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UnitBaseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UnitBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $unitBases = UnitBase::all();

        return view('unit-base.index', compact('unitBases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $unitBase = new UnitBase();

        return view('unit-base.create', compact('unitBase'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitBaseRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        UnitBase::create($data);

        return Redirect::route('unit-bases.index')
            ->with('success', __('Unit Base').__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $unitBase = UnitBase::find($id);

        return view('unit-base.show', compact('unitBase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $unitBase = UnitBase::find($id);

        return view('unit-base.edit', compact('unitBase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitBaseRequest $request, UnitBase $unitBase): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $unitBase->update($data);

        return Redirect::route('unit-bases.index')
            ->with('success', __('Unit Base').__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        UnitBase::find($id)->delete();

        return Redirect::route('unit-bases.index')
            ->with('success', __('Unit Base').  __('validation.attributes.successfully_removed'));
    }
}
