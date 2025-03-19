<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrderProductRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $orderProducts = OrderProduct::all();

        return view('order-product.index', compact('orderProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $orderProduct = new OrderProduct();

        return view('order-product.create', compact('orderProduct'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderProductRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['is_is_activated'] = $request->input('is_is_activated') === 'on' ? 1 : 0;
        OrderProduct::create($data);

        return Redirect::route('order-products.index')
            ->with('success', 'OrderProduct '.__('validation.attributes.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $orderProduct = OrderProduct::find($id);

        return view('order-product.show', compact('orderProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $orderProduct = OrderProduct::find($id);

        return view('order-product.edit', compact('orderProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderProductRequest $request, OrderProduct $orderProduct): RedirectResponse
    {
        $data =$request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $orderProduct->update($data);

        return Redirect::route('order-products.index')
            ->with('success', 'OrderProduct '.__('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        OrderProduct::find($id)->delete();

        return Redirect::route('order-products.index')
            ->with('success', 'OrderProduct '.  __('validation.attributes.successfully_removed'));
    }
}
