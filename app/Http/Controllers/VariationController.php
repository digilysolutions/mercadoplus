<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VariationRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $variations = Variation::all();

        return view('variation.index', compact('variations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $variation = new Variation();

        return view('variation.create', compact('variation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VariationRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        Variation::create($data);

        return Redirect::route('variations.index')
            ->with('success', 'Variation '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $variation = Variation::find($id);

        return view('variation.show', compact('variation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $variation = Variation::find($id);

        return view('variation.edit', compact('variation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VariationRequest $request, Variation $variation): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $variation->update($data);

        return Redirect::route('variations.index')
            ->with('success', 'Variation '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Variation::find($id)->delete();

        return Redirect::route('variations.index')
            ->with('success', 'Variation '.  __('validation.attributes.successfully_removed'));
    }
}
