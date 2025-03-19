<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BusinessRequest;
use App\Models\CountryCurrency;
use App\Models\Currency;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $business = Business::first();
        $countries_currencies =CountryCurrency::allActivated();
        $categories = ProductCategory::allActivated();
        $employees = $business->employees;
        $currencies = Currency::allActivated();
        $reviews = Review::allActivated();
        $products = Product::allActivated();

        return view('business.index', compact('products', 'business', 'reviews', 'countries_currencies', 'categories', 'employees', 'currencies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $business = new Business();

        return view('business.create', compact('business'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        Business::create($data);

        return Redirect::route('businesses.index')
            ->with('success', 'Business ' . __('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $business = Business::find($id);

        return view('business.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $business = Business::find($id);

        return view('business.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessRequest $request, Business $business): RedirectResponse
    {
        $data = $request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $business->update($data);

        return Redirect::route('businesses.index')
            ->with('success', 'Business ' . __('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Business::find($id)->delete();

        return Redirect::route('businesses.index')
            ->with('success', 'Business ' .  __('validation.attributes.successfully_removed'));
    }
}
