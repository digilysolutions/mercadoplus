<?php

namespace App\Http\Controllers;

use App\Models\DiscountsByImportantDate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DiscountsByImportantDateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DiscountsByImportantDateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $discountsByImportantDates = DiscountsByImportantDate::all();

        return view('discounts-by-important-date.index', compact('discountsByImportantDates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $discountsByImportantDate = new DiscountsByImportantDate();

        return view('discounts-by-important-date.create', compact('discountsByImportantDate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountsByImportantDateRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        DiscountsByImportantDate::create($data);

        return Redirect::route('discounts-by-important-dates.index')
            ->with('success', 'DiscountsByImportantDate '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $discountsByImportantDate = DiscountsByImportantDate::find($id);

        return view('discounts-by-important-date.show', compact('discountsByImportantDate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $discountsByImportantDate = DiscountsByImportantDate::find($id);

        return view('discounts-by-important-date.edit', compact('discountsByImportantDate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountsByImportantDateRequest $request, DiscountsByImportantDate $discountsByImportantDate): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $discountsByImportantDate->update($data);

        return Redirect::route('discounts-by-important-dates.index')
            ->with('success', 'DiscountsByImportantDate '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        DiscountsByImportantDate::find($id)->delete();

        return Redirect::route('discounts-by-important-dates.index')
            ->with('success', 'DiscountsByImportantDate '.  __('validation.attributes.successfully_removed'));
    }
}
