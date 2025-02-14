@extends('layouts.app')
@section('header-title')
    Isla de la Juventud - Tienda
@endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-orange-mobile" href="/">Inicio</a>
                    <span class="breadcrumb-item text-dark-mobile active ">Tienda</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">


                <!-- Categoria Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filtrar por
                        Categoría</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
@foreach ($categories as $category )
<div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
    <input type="checkbox" class="custom-control-input" id="{{ $category['id']}}" name="{{ $category['id']}}">
    <label class="custom-control-label" for="color-1">{{ $category['name']}}</label>
    <span class="badge border font-weight-normal">{{count($category['products'])}}</span>
</div>
@endforeach


                    </form>
                </div>
                <!-- Categoria End -->


            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8 container-fluid pt-5 pb-3 ">
                <div class="row px-xl-5">

                    @foreach ($productsPaginator as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-image position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ $product['outstanding_image'] }}" alt="" />
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate"
                                        href="{{ route('product.detailsproduct', ['id' => $product['id']]) }}">{{ $product['name'] }}
                                    </a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        @if ($product['discounted_price'] != null && $product['discounted_price'] > 0)
                                            <h5 class="product_{{ $product['id'] }}">${{ $product['discounted_price'] }}
                                            </h5>
                                            <h6 id=""
                                                class="text-muted ml-2 product_{{ $product['id'] }}  sale-price"
                                                data-product-id={{ $product['id'] }}>
                                                <del>${{ $product['sale_price'] ?? 0 }}</del>
                                            </h6>
                                        @else
                                            <h5 class="product_{{ $product['id'] }}">${{ $product['sale_price'] ?? 0 }}
                                            </h5>
                                        @endif
                                    </div>
                                    <div class="estrellas align-items-center justify-content-center " id="estrellas"
                                        data-calificacion="{{ $product['averageRating'] }}">
                                        <span class="estrella" data-valor="1">&#9734;</span>
                                        <span class="estrella" data-valor="2">&#9734;</span>
                                        <span class="estrella" data-valor="3">&#9734;</span>
                                        <span class="estrella" data-valor="4">&#9734;</span>
                                        <span class="estrella" data-valor="5">&#9734;</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-">
                                        <div class="btn-group mx-2">
                                            <div class="btn-group mx-2">
                                                <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    <i class="fas fa-money-bill icon-header"></i>
                                                    <strong class="selectedCurrency"
                                                        data-product-id="{{ $product['id'] }}">{{ isset($product['categories']) && count($product['categories']) > 0 ? $product['categories'][0]['code_currency_default'] : '' }}</strong>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @foreach ($countryCurrencies as $countryCurrency)
                                                        <button class="dropdown-item" type="button"
                                                            onclick="changeCurrency('{{ $countryCurrency['currency']['code'] }}', {{ $product['id'] }})">
                                                            <strong>{{ $countryCurrency['currency']['code'] }}</strong>
                                                        </button>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-dark addcart"
                                                data-id={{ $product['id'] }} data-toggle="tooltip" data-placement="bottom"
                                                data-original-title="Añadir al Carrito"><i class="fa fa-shopping-cart"></i>
                                            </button>
                                            <a href="{{ route('product.detailsproduct', ['id' => $product['id']]) }}"
                                                id="more_details" class="btn btn-outline-dark ml-2" data-toggle="tooltip"
                                                data-placement="bottom" data-original-title="Ver Detalles"><i
                                                    class="fa fa-info-circle"></i></a>
                                            <button class="btn btn-outline-dark btn-square ml-2" data-toggle="tooltip"
                                                data-placement="bottom" data-original-title="Añadir Lista de Deseos "><i
                                                    class="far fa-heart"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
        <!-- Paginación -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                Mostrando {{ $productsPaginator->firstItem() }} - {{ $productsPaginator->lastItem() }} de
                {{ $productsPaginator->total() }} productos
            </div>
            <div>
                {{ $productsPaginator->links('pagination::bootstrap-4') }} <!-- Usar paginación de Bootstrap -->
            </div>
        </div>
    </div>

    <!-- Shop End -->
@endsection
