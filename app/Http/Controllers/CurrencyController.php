<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CurrencyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $currencies = Currency::all();

        return view('currency.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $currency = new Currency();

        return view('currency.create', compact('currency'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        Currency::create($data);

        return Redirect::route('currencies.index')
            ->with('success', __('Currency') .__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $currency = Currency::find($id);

        return view('currency.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $currency = Currency::find($id);

        return view('currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyRequest $request, Currency $currency): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $currency->update($data);

        return Redirect::route('currencies.index')
            ->with('success', __('Currency').__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Currency::find($id)->delete();

        return Redirect::route('currencies.index')
            ->with('success', __('Currency').  __('validation.attributes.successfully_removed'));
    }
}
