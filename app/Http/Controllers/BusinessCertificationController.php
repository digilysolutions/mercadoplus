<?php

namespace App\Http\Controllers;

use App\Models\BusinessCertification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BusinessCertificationRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BusinessCertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $businessCertifications = BusinessCertification::all();

        return view('business-certification.index', compact('businessCertifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $businessCertification = new BusinessCertification();

        return view('business-certification.create', compact('businessCertification'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessCertificationRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        BusinessCertification::create($data);

        return Redirect::route('business-certifications.index')
            ->with('success', 'BusinessCertification '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $businessCertification = BusinessCertification::find($id);

        return view('business-certification.show', compact('businessCertification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $businessCertification = BusinessCertification::find($id);

        return view('business-certification.edit', compact('businessCertification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessCertificationRequest $request, BusinessCertification $businessCertification): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $businessCertification->update($data);

        return Redirect::route('business-certifications.index')
            ->with('success', 'BusinessCertification '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        BusinessCertification::find($id)->delete();

        return Redirect::route('business-certifications.index')
            ->with('success', 'BusinessCertification '.  __('validation.attributes.successfully_removed'));
    }
}
