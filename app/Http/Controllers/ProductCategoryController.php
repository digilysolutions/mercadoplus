<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCategoryRequest;
use App\Models\CountryCurrency;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productCategories = ProductCategory::all();

        return view('product-category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productCategory = new ProductCategory();
        $categories = ProductCategory::allActivated();
        $currencies = CountryCurrency::allActivated();

        return view('product-category.create', compact('productCategory', 'categories', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request): RedirectResponse
    {
        // Obtener datos validados
        $data = $request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;

        // Validación de imagen
        $request->validate([
            'path_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' // Tamaño máximo 2MB
        ]);

        // Manejo de la imagen
        if ($request->hasFile('path_image')) {
            $data['path_image'] = upload_image($request->file('path_image'));
        }

        // Capturar el arreglo de monedas y la moneda por defecto
        $currencyArray = json_decode($request->input('currencyArray'), true);
        $codeCurrencyDefault = $request->input('code_currency_default');

        // Inicializar el arreglo exchangeRates
        $exchangeRates = [];
        foreach ($currencyArray as $currency) {
            $exchangeRates[$currency] = $request->input($currency);
        }

        // Almacenar las tasas de cambio en el arreglo de datos
        $data['exchange_rates'] = json_encode([$codeCurrencyDefault => $exchangeRates]); // Convierte a JSON

        // Crear el ProductCategory
        ProductCategory::create($data);

        // Redireccionar
        return redirect()->route('product-categories.index')
            ->with('success', 'Categoría ' . __('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productCategory = ProductCategory::find($id);

        return view('product-category.show', compact('productCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productCategory = ProductCategory::find($id);
        $categories = ProductCategory::allActivated();
        $currencies = CountryCurrency::allActivated();
        return view('product-category.edit', compact('productCategory', 'categories', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory): RedirectResponse
    {
        $data = $request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;

        // Validación de imagen
        $request->validate([
            'path_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' // Tamaño máximo 2MB
        ]);

        // Manejo de la imagen
        if ($request->hasFile('path_image')) {
            $data['path_image'] = upload_image($request->file('path_image'));
        }

        // Capturar el arreglo de monedas y la moneda por defecto
        $currencyArray = json_decode($request->input('currencyArray'), true);
        $codeCurrencyDefault = $request->input('code_currency_default');

        // Inicializar el arreglo exchangeRates
        $exchangeRates = [];
        foreach ($currencyArray as $currency) {
            $exchangeRates[$currency] = $request->input($currency);
        }

        // Almacenar las tasas de cambio en el arreglo de datos
        $data['exchange_rates'] = json_encode([$codeCurrencyDefault => $exchangeRates]); // Convierte a JSON

        $productCategory->update($data);

        return Redirect::route('product-categories.index')
            ->with('success', 'Categoría ' . __('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        ProductCategory::find($id)->delete();

        return Redirect::route('product-categories.index')
            ->with('success', 'Categoría ' .  __('validation.attributes.successfully_removed'));
    }
}
