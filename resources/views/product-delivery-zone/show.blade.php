@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $productDeliveryZone->name ?? __('Show') . " " . __('Product Delivery Zone') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product Delivery Zone</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('product-delivery-zones.index') }}"> {{ __('Atrás') }}</a>
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
                                    <strong>Product Id:</strong>
                                    {{ $productDeliveryZone->product_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Delivery Zone Id:</strong>
                                    {{ $productDeliveryZone->delivery_zone_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
