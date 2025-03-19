@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $order->name ?? __('Show') . " " . __('Order') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Order</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('orders.index') }}"> {{ __('Atrás') }}</a>
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
                                    <strong>Temporary Id:</strong>
                                    {{ $order->temporary_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Person Id:</strong>
                                    {{ $order->person_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Purchase Person Id:</strong>
                                    {{ $order->purchase_person_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Delivery Person Id:</strong>
                                    {{ $order->delivery_person_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Status Id:</strong>
                                    {{ $order->status_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Subtotal Amount:</strong>
                                    {{ $order->subtotal_amount }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Total Amount:</strong>
                                    {{ $order->total_amount }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Currency:</strong>
                                    {{ $order->currency }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Exchange Rate:</strong>
                                    {{ $order->exchange_rate }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Address:</strong>
                                    {{ $order->address }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Home Delivery:</strong>
                                    {{ $order->home_delivery }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Delivery Fee:</strong>
                                    {{ $order->delivery_fee }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Purchase Date:</strong>
                                    {{ $order->purchase_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Delivery Date:</strong>
                                    {{ $order->delivery_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Delivery Time:</strong>
                                    {{ $order->delivery_time }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Time Unit:</strong>
                                    {{ $order->time_unit }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
