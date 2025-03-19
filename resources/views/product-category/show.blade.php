@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $productCategory->name ?? __('Show') . " " . __('Categoría del Producto') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Categoría del Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('product-categories.index') }}"> {{ __('Atrás') }}</a>
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

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="profile-img position-relative">
                                        <img src="{{ $productCategory->path_image }}" class="img-fluid rounded" alt="profile-image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-5">
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $productCategory->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripción:</strong>
                                    {{ $productCategory->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Categoría Superior:</strong>
                                    {{ $productCategory->category_parent }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Activado:</strong>
                                    {{ $productCategory->is_activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tasa de Cambio:</strong>
                                    {{ $productCategory->exchange_rates }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Moneda: </strong>
                                    {{ $productCategory->code_currency_default }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad de Productos: </strong>
                                    {{ count($productCategory->products) }}
                                </div>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
