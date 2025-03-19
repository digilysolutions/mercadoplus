@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $personStatus->name ?? __('Show') . ' ' . __('Producto') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <a href="{{ route('products.show', $product->id) }}">
                                <span class="card-title">{{ __('Show') }} Producto</span>
                            </a>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}">{{ __('Atrás') }}</a>
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
                                        <img src="{{ $product->outstanding_image }}" class="img-fluid rounded"
                                            alt="profile-image">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $product->name ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Marca:</strong>
                                    {{ isset($product->brand) && $product->brand !== null ? $product->brand->name : 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Modelo:</strong>
                                    {{ isset($product->modelProduct) && $product->modelProduct !== null ? $product->modelProduct->name : 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Etiqueta:</strong>
                                    @if ($product->tags->isEmpty())
                                        <span>No disponible</span>
                                    @else
                                        @foreach ($product->tags as $tag)
                                            <span class="mt-2 badge badge-primary">{{ $tag->name }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Términos:</strong>
                                    @foreach ($groupedTerms as $attribute => $terms)
                                        <br>
                                        <strong class="ml-3">{{ $attribute }}:</strong>
                                        @foreach ($terms as $term)
                                            <span class="mt-2 badge badge-primary"> {{ $term }}
                                            </span>
                                        @endforeach
                                    @endforeach
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Description:</strong>
                                    {{ $product->description ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Description corta:</strong>
                                    {{ $product->description_small ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>SKU:</strong>
                                    {{ $product->sku ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha de expiración:</strong>
                                    {{ $product->expiration_date ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Periodo de Expiración:</strong>
                                    {{ $product->expiry_period ?: 'No disponible' }}
                                    {{ $product->expiry_period_type ?: '' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Precio de Compras:</strong>
                                    {{ $product->purchase_price ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Precio de Venta:</strong>
                                    {{ $product->sale_price ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Precio de Rebaja:</strong>
                                    {{ $product->discounted_price ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Alto:</strong>
                                    {{ $product->height ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Ancho:</strong>
                                    {{ $product->width ?: 'No disponible' }}
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad mínima de productos:</strong>
                                    {{ $product->stocks->max('minimum_quantity') ?: 'No disponible' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad máxima de productos:</strong>
                                    {{ $product->stocks->max('maximum_quantity') ?: 'No disponible' }}
                                </div>


                                <div class="form-group mb-2 mb20">
                                    <strong>Largo:</strong>
                                    {{ $product->length ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Categoría:</strong>

                                    @foreach ($categoryCounts as $categoryCount)
                                        <br>
                                        <a href="{{ route('product-categories.show', $categoryCount['id']) }}"
                                            class="btn mb-1 bg-primary-light">
                                            {{ $categoryCount['category'] }}
                                            <span class="badge badge-primary ml-5">{{ $categoryCount['product_count'] }}
                                                productos</span>
                                        </a>
                                    @endforeach

                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Tiene Almacén:</strong>
                                    {{ $product->enable_stock ? 'Sí' : 'No' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Tiene variaciones:</strong>
                                    {{ $product->enable_variations ? 'Sí' : 'No' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Unidad:</strong>
                                    {{ $product->unit_id ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Activado:</strong>
                                    {{ $product->is_activated ? 'Sí' : 'No' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha inicio del descuento:</strong>
                                    {{ $product->start_date_discounted_price ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha fin del descuento:</strong>
                                    {{ $product->end_date_discounted_price ?: 'No disponible' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Tiene domicilio:</strong>
                                    {{ $product->enable_delivery ? 'Sí' : 'No' }}



                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Se puede hacer reservaciones:</strong>
                                    {{ $product->enable_reservation ? 'Sí' : 'No' }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Zonas de Domicilio: {{ count($product->deliveryZones) }}</strong>
                                    @foreach ($product->deliveryZones as $deliveryZone)
                                        <br>
                                        <button type="button" class="btn mb-1 bg-primary-light">
                                            {{ $deliveryZone->location->name }} <span
                                                class="badge badge-primary ml-5">${{ $deliveryZone->price }}</span>
                                        </button>
                                    @endforeach
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad de productos:</strong>
                                    {{ $product->stocks->max('quantity_available') ?: 'No disponible' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
