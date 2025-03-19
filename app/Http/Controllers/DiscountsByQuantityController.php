<?php

namespace App\Http\Controllers;

use App\Models\DiscountsByQuantity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DiscountsByQuantityRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DiscountsByQuantityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $discountsByQuantities = DiscountsByQuantity::all();

        return view('discounts-by-quantity.index', compact('discountsByQuantities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $discountsByQuantity = new DiscountsByQuantity();

        return view('discounts-by-quantity.create', compact('discountsByQuantity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountsByQuantityRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        DiscountsByQuantity::create($data);

        return Redirect::route('discounts-by-quantities.index')
            ->with('success', 'DiscountsByQuantity '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $discountsByQuantity = DiscountsByQuantity::find($id);

        return view('discounts-by-quantity.show', compact('discountsByQuantity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $discountsByQuantity = DiscountsByQuantity::find($id);

        return view('discounts-by-quantity.edit', compact('discountsByQuantity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountsByQuantityRequest $request, DiscountsByQuantity $discountsByQuantity): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $discountsByQuantity->update($data);

        return Redirect::route('discounts-by-quantities.index')
            ->with('success', 'DiscountsByQuantity '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        DiscountsByQuantity::find($id)->delete();

        return Redirect::route('discounts-by-quantities.index')
            ->with('success', 'DiscountsByQuantity '.  __('validation.attributes.successfully_removed'));
    }
}
