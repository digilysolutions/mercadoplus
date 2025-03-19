<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RatingRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $ratings = Rating::all();

        return view('rating.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $rating = new Rating();

        return view('rating.create', compact('rating'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RatingRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        Rating::create($data);

        return Redirect::route('ratings.index')
            ->with('success', 'Rating '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $rating = Rating::find($id);

        return view('rating.show', compact('rating'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $rating = Rating::find($id);

        return view('rating.edit', compact('rating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RatingRequest $request, Rating $rating): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $rating->update($data);

        return Redirect::route('ratings.index')
            ->with('success', 'Rating '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Rating::find($id)->delete();

        return Redirect::route('ratings.index')
            ->with('success', 'Rating '.  __('validation.attributes.successfully_removed'));
    }
}
