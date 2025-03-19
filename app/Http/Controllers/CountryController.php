<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $countries = Country::all();

        return view('country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $country = new Country();

        return view('country.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request): RedirectResponse
    {
         $data =$request->validated();

        $data['is_activated'] = $request->input('is_activated') === 'on' ? 1 : 0;

        Country::create($data);

        return Redirect::route('countries.index')
            ->with('success', 'País '. __('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $country = Country::find($id);

        return view('country.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $country = Country::find($id);

        return view('country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, Country $country): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $country->update($data);

        return Redirect::route('countries.index')
            ->with('success', 'País '. __('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Country::find($id)->delete();

        return Redirect::route('countries.index')
            ->with('success', 'País '. __('validation.attributes.successfully_removed'));
    }
}
