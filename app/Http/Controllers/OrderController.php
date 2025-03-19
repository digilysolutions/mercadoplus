<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $orders = Order::all();

        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $order = new Order();

        return view('order.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        Order::create($data);

        return Redirect::route('orders.index')
            ->with('success', 'Order '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $order = Order::find($id);

        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $order = Order::find($id);

        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $order->update($data);

        return Redirect::route('orders.index')
            ->with('success', 'Order '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Order::find($id)->delete();

        return Redirect::route('orders.index')
            ->with('success', 'Order '.  __('validation.attributes.successfully_removed'));
    }
}
