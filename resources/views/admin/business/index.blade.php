@extends('layouts.app-admin')
@section('title-header-admin')
    Negocio
@endsection
@section('content-admin')
    @php
        $defualt_currency = 0;
        $arrayCurrencies = [];
        $name_defualt_currency ="";

    @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card car-transparent">
                    <div class="card-body p-0">
                        <div class="profile-image position-relative">
                            <img src="{{ asset('admin/images/profile.png') }}" class="img-fluid rounded w-100"
                                alt="profile-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-sm-0 px-3">
            <div class="col-lg-5 card-profile">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="profile-img position-relative">
                                <img src="{{ $business['logo'] }}" class="img-fluid rounded avatar-110" alt="profile-image">
                            </div>
                            <div class="ml-3">
                                <h4 class="mb-1">{{ $business['name'] }}</h4>
                                <p class="mb-2">{{ $business['industry'] }}</p>
                                <a href="https://wa.me/{{ $business['contact']['mobile'] }}"
                                    class="btn btn-success font-size-14">Contactar Whatsapp</a>
                            </div>
                        </div>
                        <p>
                            {{ $business['description'] }}
                        </p>
                        <ul class="list-inline p-0 m-0">
                            <li class="mb-2">
                                <div class="d-flex align-items-center">
                                    <svg class="svg-icon mr-3" height="16" width="16"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <p class="mb-0">{{ $business['country']['name'] }} -
                                        {{ $business['municipality']['name'] }}</p>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="d-flex align-items-center">
                                    <svg class="svg-icon mr-3" height="16" width="16"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mb-0">Monedas: @foreach ($countries_currencies as $currency)
                                       @php
                                           
                                     $arrayCurrencies[($currency['currency']['currency'])] = $currency['currency']['id']   @endphp 
                                            <span
                                                class="mt-2 badge @if ($currency['code_currency_default']) @php $defualt_currency = 1; $name_defualt_currency  = $currency['currency']['code'] ; @endphp badge-danger @else badge-light @endif ">
                                                {{ $currency['currency']['code'] }} </span>
                                        @endforeach
                                    </p>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="d-flex align-items-center">
                                    <svg class="svg-icon mr-3" height="16" width="16"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                                    </svg>
                                    <p class="mb-0">CEO: {{ $business['owner_person']['first_name'] }} </p>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="d-flex align-items-center">
                                    <svg class="svg-icon mr-3" height="16" width="16"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <a href="tel:{{ $business['contact']['mobile'] }}"
                                        class="mb-0">{{ $business['contact']['mobile'] }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <svg class="svg-icon mr-3" height="16" width="16"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <a href="mail:{{ $business['contact']['email'] }}"
                                        class="mb-0">{{ $business['contact']['email'] }}</a>
                                </div>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-warning mt-4" data-toggle="modal"
                            data-target="#edit-business">Modificar</button>

                    </div>
                </div>

            </div>
            <div class="col-lg-7 card-profile">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <ul class="d-flex nav nav-pills mb-3 text-center profile-tab" id="profile-pills-tab"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="pill" href="#profile1" role="tab"
                                    aria-selected="false">Empleados</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#profile2" role="tab"
                                    aria-selected="false">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#profile3" role="tab"
                                    aria-selected="false">Reseñas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#profile4" role="tab"
                                    aria-selected="false">Ventas</a>
                            </li>

                        </ul>
                        <div class="profile-content tab-content">

                            <div id="profile1" class="tab-pane fade active show">

                                <div class="row">
                                    <div class="px-3 pt-0 pb-0 sub-card">

                                        @foreach ($employees as $employee)
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="{{ $employee['path_image'] }}" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            </label> </h6>
                                                            <small class="text-dark px-2"> </small>
                                                        </div>
                                                        <small
                                                            class="mb-0 text-dark ">{{ $employee['pivot']['jobTitle'] }} /
                                                            <b>Salario: ${{ $employee['pivot']['salary'] }}</b> </small>

                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div id="profile2" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card card-block card-stretch">
                                            <div class="card-body p-3">
                                                <div class="row align-items-center text-center py-2">

                                                    @foreach ($categories as $category)
                                                        <div class="profile-info col-xl-3 col-lg-6">

                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ $category['path_image'] }}"
                                                                    class="img-fluid rounded avatar-100 " width="22"
                                                                    height="22" alt="{{ $category['name'] }}" />
                                                            </div>
                                                            <h5 class="mb-2 mt-3 icon-text-warning">
                                                                {{ count($category['products']) }}</h5>
                                                            <p class="mb-0">{{ $category['name'] }}</p>
                                                        </div>
                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="card card-block card-stretch mb-0">
                                                    <div class="card-header px-3">
                                                        <div class="header-title">
                                                            <h4 class="card-title">Últimos Productos</h4>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-3">
                                                        <ul class="list-inline p-0 mb-0">

                                                            @foreach ($products->take(3) as $product)
                                                                <li>
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between mb-2">
                                                                        <p class="mb-0 font-size-16 mr-3">
                                                                            {{ $product['name'] }}</p>
                                                                        <h6>${{ $product['sale_price'] }}</h6>
                                                                    </div>
                                                                </li>
                                                            @endforeach



                                                        </ul>
                                                        <a class="right-ic btn btn-primary btn-block position-relative p-2"
                                                            href="{{ route('products.index') }}" role="button">
                                                            Ver Todos
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="profile3" class="tab-pane fade">
                                <div
                                    class="profile-line m-0 d-flex align-items-center justify-content-between position-relative">
                                    <ul class="list-inline p-0 m-0 w-100">
                                        @foreach ($reviews->take(3) as $review)
                                            <li>
                                                <div class="row align-items-top">
                                                    <div class="col-md-3">
                                                        <h6 class="mb-2">{{ $review['date'] }}</h6>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="media profile-media align-items-top">
                                                            <div class="profile-dots border-primary mt-1"></div>
                                                            <div class="ml-4">
                                                                <h6 class=" mb-1">
                                                                    {{ substr($review['comment'], 0, 40) }}...</h6>
                                                                <i class="mb-0 font-size-14">Por:
                                                                    {{ $review['writer']['first_name'] }}
                                                                    {{ $review['writer']['last_name'] }}
                                                                    @if ($review['product_id'] == null)
                                                                        <label
                                                                            class="mt-2 badge border border-primary text-primary mt-2">
                                                                            Negocio</label>
                                                                    @else
                                                                        <label
                                                                            class="mt-2 badge border border-secondary text-secondary mt-2">
                                                                            Producto</label>
                                                                    @endif
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach


                                    </ul>

                                </div>
                                <a class="right-ic btn btn-primary btn-block position-relative p-2"
                                    href="{{ route('reviews.index') }}" role="button">
                                    Ver Todos
                                </a>
                            </div>
                            <div id="profile4" class="tab-pane fade">
                                <div
                                    class="profile-line m-0 d-flex align-items-center justify-content-between position-relative">
                                    <ul class="list-inline p-0 m-0 w-100">
                                        <li>
                                            <div class="row align-items-top">
                                                <div class="col-md-3">
                                                    <h6 class="mb-2">2020 - present</h6>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="media profile-media align-items-top">
                                                        <div class="profile-dots border-primary mt-1"></div>
                                                        <div class="ml-4">
                                                            <h6 class=" mb-1">Software Engineer at Mathica Labs</h6>
                                                            <p class="mb-0 font-size-14">Total : 02 + years of experience
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row align-items-top">
                                                <div class="col-md-3">
                                                    <h6 class="mb-2">2018 - 2019</h6>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="media profile-media align-items-top">
                                                        <div class="profile-dots border-primary mt-1"></div>
                                                        <div class="ml-4">
                                                            <h6 class=" mb-1">Junior Software Engineer at Zimcore
                                                                Solutions</h6>
                                                            <p class="mb-0 font-size-14">Total : 1.5 + years of experience
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row align-items-top">
                                                <div class="col-md-3">
                                                    <h6 class="mb-2">2017 - 2018</h6>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="media profile-media align-items-top">
                                                        <div class="profile-dots border-primary mt-1"></div>
                                                        <div class="ml-4">
                                                            <h6 class=" mb-1">Junior Software Engineer at Skycare Ptv. Ltd
                                                            </h6>
                                                            <p class="mb-0 font-size-14">Total : 0.5 + years of experience
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row align-items-top">
                                                <div class="col-3">
                                                    <h6 class="mb-2">06 Months</h6>
                                                </div>
                                                <div class="col-9">
                                                    <div class="media profile-media pb-0 align-items-top">
                                                        <div class="profile-dots border-primary mt-1"></div>
                                                        <div class="ml-4">
                                                            <h6 class=" mb-1">Junior Software Engineer at Infosys
                                                                Solutions</h6>
                                                            <p class="mb-0 font-size-14">Total : Freshers</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.business.edit-modal')
@endsection

@section('js')
    <script src="{{ asset('includes/admin/country-currency-admin.js') }}"></script>
    <script src="{{ asset('includes/admin/script.js') }}"></script>
@endsection
