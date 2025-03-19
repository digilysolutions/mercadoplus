<?php

namespace App\Http\Controllers;

use App\Models\PersonStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PersonStatusRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PersonStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $personStatuses = PersonStatus::all();

        return view('person-status.index', compact('personStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $personStatus = new PersonStatus();

        return view('person-status.create', compact('personStatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonStatusRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        PersonStatus::create($data);

        return Redirect::route('person-statuses.index')
            ->with('success', 'PersonStatus '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $personStatus = PersonStatus::find($id);

        return view('person-status.show', compact('personStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $personStatus = PersonStatus::find($id);

        return view('person-status.edit', compact('personStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonStatusRequest $request, PersonStatus $personStatus): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $personStatus->update($data);

        return Redirect::route('person-statuses.index')
            ->with('success', 'PersonStatus '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        PersonStatus::find($id)->delete();

        return Redirect::route('person-statuses.index')
            ->with('success', 'PersonStatus '.  __('validation.attributes.successfully_removed'));
    }
}
