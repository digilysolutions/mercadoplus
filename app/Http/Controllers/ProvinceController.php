<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProvinceRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $provinces = Province::all();

        return view('province.index', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $province = new Province();

        return view('province.create', compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProvinceRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        Province::create($data);

        return Redirect::route('provinces.index')
            ->with('success', 'Province '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $province = Province::find($id);

        return view('province.show', compact('province'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $province = Province::find($id);

        return view('province.edit', compact('province'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProvinceRequest $request, Province $province): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $province->update($data);

        return Redirect::route('provinces.index')
            ->with('success', 'Province '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Province::find($id)->delete();

        return Redirect::route('provinces.index')
            ->with('success', 'Province '.  __('validation.attributes.successfully_removed'));
    }
}
