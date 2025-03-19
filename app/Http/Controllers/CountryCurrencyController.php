<?php

namespace App\Http\Controllers;

use App\Models\CountryCurrency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CountryCurrencyRequest;
use App\Models\Currency;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CountryCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $countryCurrencies = CountryCurrency::all();

        return view('country-currency.index', compact('countryCurrencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $countryCurrency = new CountryCurrency();
        $currencies = Currency::allActivated();
        $defualt_currency = CountryCurrency::where('code_currency_default', 1)->first();

        return view('country-currency.create', compact('countryCurrency','currencies','defualt_currency'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryCurrencyRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        CountryCurrency::create($data);

        return Redirect::route('country-currencies.index')
            ->with('success', __('Currency') . __('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $countryCurrency = CountryCurrency::find($id);

        return view('country-currency.show', compact('countryCurrency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $countryCurrency = CountryCurrency::find($id);
        $currencies = Currency::allActivated();
        $defualt_currency = CountryCurrency::where('code_currency_default', 1)->first();

        return view('country-currency.edit', compact('countryCurrency','currencies','defualt_currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryCurrencyRequest $request, CountryCurrency $countryCurrency): RedirectResponse
    {
        $data = $request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $countryCurrency->update($data);

        return Redirect::route('country-currencies.index')
            ->with('success', __('Currency') . __('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        CountryCurrency::find($id)->delete();

        return Redirect::route('country-currencies.index')
            ->with('success', __('Currency') .  __('validation.attributes.successfully_removed'));
    }
}
