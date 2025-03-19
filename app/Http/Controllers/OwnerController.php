<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $owners = Owner::all();

        return view('owner.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $owner = new Owner();

        return view('owner.create', compact('owner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OwnerRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        Owner::create($data);

        return Redirect::route('owners.index')
            ->with('success', 'Owner '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $owner = Owner::find($id);

        return view('owner.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $owner = Owner::find($id);

        return view('owner.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OwnerRequest $request, Owner $owner): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $owner->update($data);

        return Redirect::route('owners.index')
            ->with('success', 'Owner '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Owner::find($id)->delete();

        return Redirect::route('owners.index')
            ->with('success', 'Owner '.  __('validation.attributes.successfully_removed'));
    }
}
