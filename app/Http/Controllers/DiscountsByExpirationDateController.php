<?php

namespace App\Http\Controllers;

use App\Models\DiscountsByExpirationDate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DiscountsByExpirationDateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DiscountsByExpirationDateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $discountsByExpirationDates = DiscountsByExpirationDate::all();

        return view('discounts-by-expiration-date.index', compact('discountsByExpirationDates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $discountsByExpirationDate = new DiscountsByExpirationDate();

        return view('discounts-by-expiration-date.create', compact('discountsByExpirationDate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountsByExpirationDateRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        DiscountsByExpirationDate::create($data);

        return Redirect::route('discounts-by-expiration-dates.index')
            ->with('success', 'DiscountsByExpirationDate '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $discountsByExpirationDate = DiscountsByExpirationDate::find($id);

        return view('discounts-by-expiration-date.show', compact('discountsByExpirationDate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $discountsByExpirationDate = DiscountsByExpirationDate::find($id);

        return view('discounts-by-expiration-date.edit', compact('discountsByExpirationDate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountsByExpirationDateRequest $request, DiscountsByExpirationDate $discountsByExpirationDate): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $discountsByExpirationDate->update($data);

        return Redirect::route('discounts-by-expiration-dates.index')
            ->with('success', 'DiscountsByExpirationDate '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        DiscountsByExpirationDate::find($id)->delete();

        return Redirect::route('discounts-by-expiration-dates.index')
            ->with('success', 'DiscountsByExpirationDate '.  __('validation.attributes.successfully_removed'));
    }
}
