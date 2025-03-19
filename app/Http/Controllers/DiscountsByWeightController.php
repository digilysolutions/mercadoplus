<?php

namespace App\Http\Controllers;

use App\Models\DiscountsByWeight;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DiscountsByWeightRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DiscountsByWeightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $discountsByWeights = DiscountsByWeight::all();

        return view('discounts-by-weight.index', compact('discountsByWeights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $discountsByWeight = new DiscountsByWeight();

        return view('discounts-by-weight.create', compact('discountsByWeight'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountsByWeightRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        DiscountsByWeight::create($data);

        return Redirect::route('discounts-by-weights.index')
            ->with('success', 'DiscountsByWeight '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $discountsByWeight = DiscountsByWeight::find($id);

        return view('discounts-by-weight.show', compact('discountsByWeight'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $discountsByWeight = DiscountsByWeight::find($id);

        return view('discounts-by-weight.edit', compact('discountsByWeight'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountsByWeightRequest $request, DiscountsByWeight $discountsByWeight): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $discountsByWeight->update($data);

        return Redirect::route('discounts-by-weights.index')
            ->with('success', 'DiscountsByWeight '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        DiscountsByWeight::find($id)->delete();

        return Redirect::route('discounts-by-weights.index')
            ->with('success', 'DiscountsByWeight '.  __('validation.attributes.successfully_removed'));
    }
}
