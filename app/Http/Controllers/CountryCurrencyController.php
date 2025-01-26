<?php

namespace App\Http\Controllers;

use App\Services\CountryCurrencyService;
use App\Services\CountryService;
use App\Services\CurrencyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountryCurrencyController extends Controller
{
    protected $countryCurrencyService;
    protected $currencyService;
    public function __construct(CountryCurrencyService $countryCurrencyService, CurrencyService $currencyService)
    {
        $this->countryCurrencyService = $countryCurrencyService;
        $this->currencyService = $currencyService;
    }

    public function index()
    {
        $countries_currencies = $this->countryCurrencyService->getCountryCurrency();
        $countries_currencies  = $countries_currencies["data"];
        $currencies = $this->currencyService->getCurrencies();
        $currencies  = $currencies["data"];

       return view('admin.currency-country.index', compact('countries_currencies','currencies'));
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'country',
            'currency_id',
            'country_id',
            'exchange_rate',
            'code_currency_default',
            'is_activated'
        ]);
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $data['code_currency_default'] = isset($data['code_currency_default']) && $data['code_currency_default'] == 'on' ? 1 : 0;
        $this->countryCurrencyService->createCountryCurrency($data);
        return $this->index();
    }

    public function show($id)
    {

        $currency = $this->countryCurrencyService->showCountryCurrency($id);
        // Devuelve la moneda como respuesta JSON
        return response()->json($currency);
    }
    public function delete($id)
    {
        $currency = $this->countryCurrencyService->deleteCountryCurrency($id);
        return response()->json($currency);
    }

    public function update(Request $request, $id)
    {

        $data = $request->only([
            'country',
            'currency_id',
            'country_id',
            'exchange_rate',
            'code_currency_default',
            'is_activated'
        ]);

        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $data['code_currency_default'] = isset($data['code_currency_default']) && $data['code_currency_default'] == 'on' ? 1 : 0;
        $this->countryCurrencyService->updateCountryCurrency($id, $data);
        return  $this->index();
    }
}
