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
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                        price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->

                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                        color</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                        size</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row px-xl-5">

                    @foreach ($productsPaginator as $product)
                        <div class="col-lg-3 col-md-3 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-image position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ $product['outstanding_image'] }}"
                                        alt="" />
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
                                                data-id={{ $product['id'] }} data-toggle="tooltip"
                                                data-placement="bottom" data-original-title="Añadir al Carrito"><i
                                                    class="fa fa-shopping-cart"></i>
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
    </div>
    <!-- Shop End -->
@endsection
