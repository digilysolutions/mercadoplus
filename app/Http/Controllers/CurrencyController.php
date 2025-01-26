<?php

namespace App\Http\Controllers;

use App\Services\CurrencyService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{

    protected $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }
    public function index()
    {
        return "index";
        $currencies = $this->currencyService->getCurrencies();
        $currencies  = $currencies["data"];
        return view('admin.currencies.index', compact('currencies'));
    }

    public function store(Request $request)
    {
        return "store";
        /* The code snippet you provided is from a PHP Laravel controller `CategoryController`. Let's
       break down the code: */
        $data = $request->only([ 'country',
        'currency',
        'is_activated',
        'path_flag',
        'code',
        'symbol',
        'thousand_separator',
        'decimal_separator']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $this->currencyService->createCurrency($data);
        return $this->index();
    }

    public function show($id)
    {  return "show";
        // Obtiene la moneda por ID
        $currency = $this->currencyService->showCurrency($id);
        // Devuelve la moneda como respuesta JSON
        return response()->json($currency);
    }
    public function delete($id)
    {
          return "delete";
        // Obtiene la moneda por ID
        $currency = $this->currencyService->deleteCurrency($id);
        // Devuelve moneda como respuesta JSON
        return response()->json($currency);
    }

    public function update(Request $request, $id)
    {
        return "update";
        // Obtener solo los datos relevantes del request
        $data = $request->only([ 'country',
        'currency',
        'is_activated',
        'path_flag',
        'code',
        'symbol',
        'thousand_separator',
        'decimal_separator']);
        // Convertir is_activated a un valor entero (1 o 0)
        $data['is_activated'] = isset($data['is_activated']) && $data['is_activated'] == 'on' ? 1 : 0;
        $this->currencyService->updateCurrency($id, $data);
        // Devuelve moneda actualizada como respuesta JSON o redirige a la lista

        return  $this->index();
    }


    
}
