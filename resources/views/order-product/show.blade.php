@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $orderProduct->name ?? __('Show') . " " . __('Order Product') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Order Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('order-products.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                     @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif<div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Order Id:</strong>
                                    {{ $orderProduct->order_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Person Id:</strong>
                                    {{ $orderProduct->person_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Price:</strong>
                                    {{ $orderProduct->price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Quantity:</strong>
                                    {{ $orderProduct->quantity }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Total Price:</strong>
                                    {{ $orderProduct->total_price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Subtotal Price:</strong>
                                    {{ $orderProduct->subtotal_price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Price Discount:</strong>
                                    {{ $orderProduct->price_discount }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
