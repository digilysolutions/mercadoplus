<?php

namespace App\Http\Controllers;

use App\Models\TaxsRate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TaxsRateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TaxsRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $taxsRates = TaxsRate::all();

        return view('taxs-rate.index', compact('taxsRates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $taxsRate = new TaxsRate();

        return view('taxs-rate.create', compact('taxsRate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaxsRateRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        TaxsRate::create($data);

        return Redirect::route('taxs-rates.index')
            ->with('success', 'TaxsRate '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $taxsRate = TaxsRate::find($id);

        return view('taxs-rate.show', compact('taxsRate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $taxsRate = TaxsRate::find($id);

        return view('taxs-rate.edit', compact('taxsRate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaxsRateRequest $request, TaxsRate $taxsRate): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $taxsRate->update($data);

        return Redirect::route('taxs-rates.index')
            ->with('success', 'TaxsRate '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        TaxsRate::find($id)->delete();

        return Redirect::route('taxs-rates.index')
            ->with('success', 'TaxsRate '.  __('validation.attributes.successfully_removed'));
    }
}
