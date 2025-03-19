<?php

namespace App\Http\Controllers;

use App\Models\StatusOrder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StatusOrderRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StatusOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $statusOrders = StatusOrder::all();

        return view('status-order.index', compact('statusOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $statusOrder = new StatusOrder();

        return view('status-order.create', compact('statusOrder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusOrderRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        StatusOrder::create($data);

        return Redirect::route('status-orders.index')
            ->with('success', 'StatusOrder '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $statusOrder = StatusOrder::find($id);

        return view('status-order.show', compact('statusOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $statusOrder = StatusOrder::find($id);

        return view('status-order.edit', compact('statusOrder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatusOrderRequest $request, StatusOrder $statusOrder): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $statusOrder->update($data);

        return Redirect::route('status-orders.index')
            ->with('success', 'StatusOrder '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        StatusOrder::find($id)->delete();

        return Redirect::route('status-orders.index')
            ->with('success', 'StatusOrder '.  __('validation.attributes.successfully_removed'));
    }
}
