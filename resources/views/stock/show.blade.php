@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $stock->name ?? __('Show') . " " . __('Stock') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Stock</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('stocks.index') }}"> {{ __('Atrás') }}</a>
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
                                    <strong>Warehouse Id:</strong>
                                    {{ $stock->warehouse_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Quantity Available:</strong>
                                    {{ $stock->quantity_available }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Minimum Quantity:</strong>
                                    {{ $stock->minimum_quantity }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Maximum Quantity:</strong>
                                    {{ $stock->maximum_quantity }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Product Id:</strong>
                                    {{ $stock->product_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Taxs Rates Id:</strong>
                                    {{ $stock->taxs_rates_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Activated:</strong>
                                    {{ $stock->is_activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Enable Discounts By Quantities:</strong>
                                    {{ $stock->enable_discounts_by_quantities }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Enable Discounts By Weights:</strong>
                                    {{ $stock->enable_discounts_by_weights }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Enable Discounts By Expiration Dates:</strong>
                                    {{ $stock->enable_discounts_by_expiration_dates }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Enable Discounts By Discounts By Important Dates:</strong>
                                    {{ $stock->enable_discounts_by_discounts_by_important_dates }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Discounts By Quantities Id:</strong>
                                    {{ $stock->discounts_by_quantities_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Discounts By Weights Id:</strong>
                                    {{ $stock->discounts_by_weights_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Discounts By Expiration Dates Id:</strong>
                                    {{ $stock->discounts_by_expiration_dates_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Discounts By Discounts By Important Dates Id:</strong>
                                    {{ $stock->discounts_by_discounts_by_important_dates_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
