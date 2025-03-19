<?php

namespace App\Http\Controllers;

use App\Models\BusinessEmployee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BusinessEmployeeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BusinessEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $businessEmployees = BusinessEmployee::all();

        return view('business-employee.index', compact('businessEmployees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $businessEmployee = new BusinessEmployee();

        return view('business-employee.create', compact('businessEmployee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessEmployeeRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        BusinessEmployee::create($data);

        return Redirect::route('business-employees.index')
            ->with('success', 'BusinessEmployee '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $businessEmployee = BusinessEmployee::find($id);

        return view('business-employee.show', compact('businessEmployee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $businessEmployee = BusinessEmployee::find($id);

        return view('business-employee.edit', compact('businessEmployee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessEmployeeRequest $request, BusinessEmployee $businessEmployee): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $businessEmployee->update($data);

        return Redirect::route('business-employees.index')
            ->with('success', 'BusinessEmployee '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        BusinessEmployee::find($id)->delete();

        return Redirect::route('business-employees.index')
            ->with('success', 'BusinessEmployee '.  __('validation.attributes.successfully_removed'));
    }
}
