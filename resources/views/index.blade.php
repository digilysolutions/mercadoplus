@extends('layouts.app')
@section('header-title')
    Isla de la Juventud
@endsection
@section('css')
    <style>
        .estrellas {
            cursor: pointer;
        }

        .estrella {
            font-size: 2rem;
            /* Tamaño de la estrella */
            color: #d45805;
            /* Color de la estrella vacía */
        }

        .estrella.pintada {
            color: #d45805;
            /* Color de la estrella llena */
        }

        .product-image {
            height: 350px;
            /* Establece la altura deseada */
            overflow: hidden;
            /* Oculta cualquier parte que desborde */
            display: flex;
            /* Usa flexbox para centrar */
            align-items: center;
            /* Centrar verticalmente */
            justify-content: center;
            /* Centrar horizontalmente */
            background-color: #f8f9fa;
            /* Color de fondo por si la imagen no se carga */
        }

        .product-image img {
            max-width: 100%;
            /* Ajusta la imagen al ancho del contenedor */
            height: auto;
            /* Mantiene la proporción de la imagen */
            object-fit: cover;
            /* Cubre el contenedor y recorta si es necesario */
        }

        .vendor-carousel img {
            width: 100%;
            /* Asegura que la imagen ocupe todo el ancho del contenedor */
            height: 200px;
            /* Establece una altura fija según tus necesidades */
            object-fit: cover;
            /* Recorta la imagen para que mantenga la relación de aspecto */
        }
    </style>
@endsection
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>

                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px">
                            <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover" />
                            <div
                                class="carousel-caption d-flex flex-colu<strong>MN</strong> align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                        Mujer SHEIN
                                    </h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                        Descubre nuestros bikinis únicos que resaltan tu estilo y confianza. ¡Haz que
                                        este verano sea inolvidable en la playa
                                    </p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Comprar Ahora</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px">
                            <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg" style="object-fit: cover" />
                            <div
                                class="carousel-caption d-flex flex-colu<strong>MN</strong> align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                        Short para Mujeres
                                    </h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                        ¡Descubre el estilo único de SHEIN! Ropa femenina moderna y a buenos precios.
                                        Renueva para lucir reluciente
                                    </p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Comprar Ahora</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px">
                    <img class="img-fluid" src="img/offer-1.jpg" alt="" />
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Rebaja 20%</h6>
                        <h3 class="text-white mb-3">Oferta Especial</h3>
                        <a href="" class="btn btn-primary">Comprar Ahora</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px">
                    <img class="img-fluid" src="img/offer-2.jpg" alt="" />
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Rebaja 35%</h6>
                        <h3 class="text-white mb-3">Oferta Especial</h3>
                        <a href="" class="btn btn-primary">Comprar Ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- Vendor Start -->  


    <div class="container-fluid py-4">
        <div class="row px-xl-4">
            <div class="col">
                <div class="owl-carousel vendor-carousel">                   
                    @foreach ($randomProducts as $product)                       
                            <div class="bg-light p-4">
                                <img src="{{  $product['outstanding_image'] }}" alt="">
                            </div>                      
                    @endforeach
                </div>               
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Categorías</span>
        </h2>
        <div class="row px-xl-5 pb-3">


            @foreach ($menuCategories as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <a class="text-orange-mobile" href="{{ url('/products-categories/' . $category['id']) }}"><img
                                    class="img-fluid w-100" src="{{ $category['path_image'] }}" alt="" /> </a>
                        </div>
                        <div class="text-center py-3"> </div>

                    </div>
                </div>
            @endforeach

        </div>
        <!-- Categories End -->
    </div>

    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Productos Destacados</span>
        </h2>
        <div class="row px-xl-5">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/products/televisor-selectron-32-pulgadas.jpg"
                            alt="" />

                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Televisor Selectron 32
                            pulgadas</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>

                        </div>
                        <div class="estrellas align-items-center justify-content-center " id="estrellas">
                            <span class="estrella" data-valor="1">&#9734;</span>
                            <span class="estrella" data-valor="2">&#9734;</span>
                            <span class="estrella" data-valor="3">&#9734;</span>
                            <span class="estrella" data-valor="4">&#9734;</span>
                            <span class="estrella" data-valor="5">&#9734;</span>
                        </div>


                        <div class="d-flex align-items-center justify-content-center mb-1">

                            <div class="btn-group mx-2">
                                <div class="btn-group mx-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown"><i class="fas fa-money-bill icon-header"></i>
                                        <strong class="selectedCurrency"></strong></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button"><strong>MN</strong></button>
                                        <button class="dropdown-item" type="button"><strong>MLC</strong></button>
                                        <button class="dropdown-item" type="button"><strong>USD</strong></button>
                                    </div>
                                </div>
                                <button id="cart_add" class="btn btn-outline-dark" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir al Carrito"><i
                                        class="fa fa-shopping-cart"></i> </button>
                                <button id="more_details  " class="btn btn-outline-dark ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Ver Detalles"><i
                                        class="fa fa-info-circle"></i> </button>
                                <button class="btn btn-outline-dark btn-square ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir Lista de Deseos "><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/products/premier-sandwichera-negro.jpg" alt="" />

                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Premier Sandwichera</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="estrellas align-items-center justify-content-center " id="estrellas">
                            <span class="estrella" data-valor="1">&#9734;</span>
                            <span class="estrella" data-valor="2">&#9734;</span>
                            <span class="estrella" data-valor="3">&#9734;</span>
                            <span class="estrella" data-valor="4">&#9734;</span>
                            <span class="estrella" data-valor="5">&#9734;</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">

                            <div class="btn-group mx-2">
                                <div class="btn-group mx-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown"><i class="fas fa-money-bill icon-header"></i>
                                        <strong class="selectedCurrency">MN</strong></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button"><strong>MN</strong></button>
                                        <button class="dropdown-item" type="button"><strong>MLC</strong></button>
                                        <button class="dropdown-item" type="button"><strong>USD</strong></button>
                                    </div>
                                </div>
                                <button id="cart_add" class="btn btn-outline-dark" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir al Carrito"><i
                                        class="fa fa-shopping-cart"></i> </button>
                                <button id="more_details  " class="btn btn-outline-dark ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Ver Detalles"><i
                                        class="fa fa-info-circle"></i> </button>
                                <button class="btn btn-outline-dark btn-square ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir Lista de Deseos "><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/products/milexus-olla-electrica-6-litros.jpg"
                            alt="" />

                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Milexus Olla Eléctrica 6
                            Litros</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>

                        </div>
                        <div class="estrellas align-items-center justify-content-center " id="estrellas">
                            <span class="estrella" data-valor="1">&#9734;</span>
                            <span class="estrella" data-valor="2">&#9734;</span>
                            <span class="estrella" data-valor="3">&#9734;</span>
                            <span class="estrella" data-valor="4">&#9734;</span>
                            <span class="estrella" data-valor="5">&#9734;</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">

                            <div class="btn-group mx-2">
                                <div class="btn-group mx-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown"><i class="fas fa-money-bill icon-header"></i>
                                        <strong class="selectedCurrency">MN</strong></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button"><strong>MN</strong></button>
                                        <button class="dropdown-item" type="button"><strong>MLC</strong></button>
                                        <button class="dropdown-item" type="button"><strong>USD</strong></button>
                                    </div>
                                </div>
                                <button id="cart_add" class="btn btn-outline-dark" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir al Carrito"><i
                                        class="fa fa-shopping-cart"></i> </button>
                                <button id="more_details  " class="btn btn-outline-dark ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Ver Detalles"><i
                                        class="fa fa-info-circle"></i> </button>
                                <button class="btn btn-outline-dark btn-square ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir Lista de Deseos "><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/products/lavadora-semiautomática-milexus.jpg"
                            alt="" />

                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Lavadora Semiautomática
                            MILEXUS</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>

                        </div>
                        <div class="estrellas align-items-center justify-content-center " id="estrellas">
                            <span class="estrella" data-valor="1">&#9734;</span>
                            <span class="estrella" data-valor="2">&#9734;</span>
                            <span class="estrella" data-valor="3">&#9734;</span>
                            <span class="estrella" data-valor="4">&#9734;</span>
                            <span class="estrella" data-valor="5">&#9734;</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">

                            <div class="btn-group mx-2">
                                <div class="btn-group mx-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown"><i class="fas fa-money-bill icon-header"></i>
                                        <strong class="selectedCurrency">MN</strong></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button"><strong>MN</strong></button>
                                        <button class="dropdown-item" type="button"><strong>MLC</strong></button>
                                        <button class="dropdown-item" type="button"><strong>USD</strong></button>
                                    </div>
                                </div>
                                <button id="cart_add" class="btn btn-outline-dark" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir al Carrito"><i
                                        class="fa fa-shopping-cart"></i> </button>
                                <button id="more_details  " class="btn btn-outline-dark ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Ver Detalles"><i
                                        class="fa fa-info-circle"></i> </button>
                                <button class="btn btn-outline-dark btn-square ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir Lista de Deseos "><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/products/televisor-selectron-65-pulgadas.jpg"
                            alt="" />

                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Televisor UHD 65"
                            Selectron</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>

                        </div>
                        <div class="estrellas align-items-center justify-content-center " id="estrellas">
                            <span class="estrella" data-valor="1">&#9734;</span>
                            <span class="estrella" data-valor="2">&#9734;</span>
                            <span class="estrella" data-valor="3">&#9734;</span>
                            <span class="estrella" data-valor="4">&#9734;</span>
                            <span class="estrella" data-valor="5">&#9734;</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">

                            <div class="btn-group mx-2">
                                <div class="btn-group mx-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown"><i class="fas fa-money-bill icon-header"></i>
                                        <strong class="selectedCurrency">MN</strong></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button"><strong>MN</strong></button>
                                        <button class="dropdown-item" type="button"><strong>MLC</strong></button>
                                        <button class="dropdown-item" type="button"><strong>USD</strong></button>
                                    </div>
                                </div>
                                <button id="cart_add" class="btn btn-outline-dark" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir al Carrito"><i
                                        class="fa fa-shopping-cart"></i> </button>
                                <button id="more_details  " class="btn btn-outline-dark ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Ver Detalles"><i
                                        class="fa fa-info-circle"></i> </button>
                                <button class="btn btn-outline-dark btn-square ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir Lista de Deseos "><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/products/televisor-full-hd-43.jpg" alt="" />

                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Televisor Full HD 43"</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>

                        </div>
                        <div class="estrellas align-items-center justify-content-center " id="estrellas">
                            <span class="estrella" data-valor="1">&#9734;</span>
                            <span class="estrella" data-valor="2">&#9734;</span>
                            <span class="estrella" data-valor="3">&#9734;</span>
                            <span class="estrella" data-valor="4">&#9734;</span>
                            <span class="estrella" data-valor="5">&#9734;</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">

                            <div class="btn-group mx-2">
                                <div class="btn-group mx-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown"><i class="fas fa-money-bill icon-header"></i>
                                        <strong class="selectedCurrency">MN</strong></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button"><strong>MN</strong></button>
                                        <button class="dropdown-item" type="button"><strong>MLC</strong></button>
                                        <button class="dropdown-item" type="button"><strong>USD</strong></button>
                                    </div>
                                </div>
                                <button id="cart_add" class="btn btn-outline-dark" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir al Carrito"><i
                                        class="fa fa-shopping-cart"></i> </button>
                                <button id="more_details  " class="btn btn-outline-dark ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Ver Detalles"><i
                                        class="fa fa-info-circle"></i> </button>
                                <button class="btn btn-outline-dark btn-square ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir Lista de Deseos "><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/products/premier-soporte-para-tv-pared--32-pulgadas.jpg"
                            alt="" />

                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Premier Soporte de Pared
                            para TV</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="estrellas align-items-center justify-content-center " id="estrellas">
                            <span class="estrella" data-valor="1">&#9734;</span>
                            <span class="estrella" data-valor="2">&#9734;</span>
                            <span class="estrella" data-valor="3">&#9734;</span>
                            <span class="estrella" data-valor="4">&#9734;</span>
                            <span class="estrella" data-valor="5">&#9734;</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">

                            <div class="btn-group mx-2">
                                <div class="btn-group mx-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown"><i class="fas fa-money-bill icon-header"></i>
                                        <strong class="selectedCurrency">MN</strong></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button"><strong>MN</strong></button>
                                        <button class="dropdown-item" type="button"><strong>MLC</strong></button>
                                        <button class="dropdown-item" type="button"><strong>USD</strong></button>
                                    </div>
                                </div>
                                <button id="cart_add" class="btn btn-outline-dark" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir al Carrito"><i
                                        class="fa fa-shopping-cart"></i> </button>
                                <button id="more_details  " class="btn btn-outline-dark ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Ver Detalles"><i
                                        class="fa fa-info-circle"></i> </button>
                                <button class="btn btn-outline-dark btn-square ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir Lista de Deseos "><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/products/Samsung-lavadora-automatica-9kg.jpg"
                            alt="" />

                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Samsung Lavadora
                            Automática</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="estrellas align-items-center justify-content-center " id="estrellas">
                            <span class="estrella" data-valor="1">&#9734;</span>
                            <span class="estrella" data-valor="2">&#9734;</span>
                            <span class="estrella" data-valor="3">&#9734;</span>
                            <span class="estrella" data-valor="4">&#9734;</span>
                            <span class="estrella" data-valor="5">&#9734;</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">

                            <div class="btn-group mx-2">
                                <div class="btn-group mx-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown"><i class="fas fa-money-bill icon-header"></i>
                                        <strong class="selectedCurrency">MN</strong></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button"><strong>MN</strong></button>
                                        <button class="dropdown-item" type="button"><strong>MLC</strong></button>
                                        <button class="dropdown-item" type="button"><strong>USD</strong></button>
                                    </div>
                                </div>
                                <button id="cart_add" class="btn btn-outline-dark" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir al Carrito"><i
                                        class="fa fa-shopping-cart"></i> </button>
                                <button id="more_details  " class="btn btn-outline-dark ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Ver Detalles"><i
                                        class="fa fa-info-circle"></i> </button>
                                <button class="btn btn-outline-dark btn-square ml-2" data-toggle="tooltip"
                                    data-placement="bottom" data-original-title="Añadir Lista de Deseos "><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px">
                    <img class="img-fluid" src="img/offer-1.jpg" alt="" />
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Rebaja 20%</h6>
                        <h3 class="text-white mb-3">Oferta Especial</h3>
                        <a href="" class="btn btn-primary">Compre Ahora</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px">
                    <img class="img-fluid" src="img/offer-2.jpg" alt="" />
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Rebaja 35%</h6>
                        <h3 class="text-white mb-3">Nueva Oferta</h3>
                        <a href="" class="btn btn-primary">Compre Ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Nuevos Productos</span>
        </h2>
        <div class="row px-xl-5">
            @foreach ($latestProducts as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-image position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ $product['outstanding_image'] }}" alt="" />
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{ $product['name'] }} </a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                @if ($product['discounted_price'] != null && $product['discounted_price'] > 0)
                                    <h5 class="product_{{ $product['id'] }}">${{ $product['discounted_price'] }}</h5>
                                    <h6 id="" class="text-muted ml-2 product_{{ $product['id'] }}  sale-price"
                                        data-product-id={{ $product['id'] }}><del>${{ $product['sale_price'] ?? 0 }}</del>
                                    </h6>
                                @else
                                    <h5 class="product_{{ $product['id'] }}">${{ $product['sale_price'] ?? 0 }}</h5>
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
                                    <a href="{{ route('product.detailsproduct', ['id' => $product['id']]) }}" id="more_details" class="btn btn-outline-dark ml-2" data-toggle="tooltip"
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
    <!-- Products End -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            // Cambia el ID a una clase si se está dentro de un 'foreach'
            $('.estrellas').each(function() {
                // Obtener la calificación desde el data attribute de cada conjunto de estrellas
                const calificacionProducto = parseInt($(this).data('calificacion'));

                // Llenar las estrellas según la calificación
                $(this).find('.estrella').each(function() {
                    const valorEstrella = parseInt($(this).data('valor'));
                    if (valorEstrella <= calificacionProducto) {
                        $(this).addClass('pintada'); // Agrega la clase para pintar la estrella
                        $(this).html('&#9733;'); // Cambia a estrella llena
                    }
                });
            });

            // Event listener para manejar el clic en las estrellas
            $('.estrella').click(function() {
                const valorSeleccionado = parseInt($(this).data('valor'));

                const $estrellas = $(this).parent(); // Obtener referencia al contenedor de estrellas

                // Limpiar anteriores estrellas
                $estrellas.find('.estrella').removeClass('pintada').html(
                    '&#9734;'); // Cambiar a estrella vacía

                // Pintar las estrellas hasta el valor seleccionado
                $estrellas.find('.estrella').each(function() {
                    const valorEstrella = parseInt($(this).data('valor'));
                    if (valorEstrella <= valorSeleccionado) {
                        $(this).addClass('pintada');
                        $(this).html('&#9733;'); // Cambiar a estrella llena
                    }
                });

                // Aquí puedes hacer una llamada AJAX para enviar el valor de la calificación seleccionada al servidor
                console.log('Valor seleccionado:', valorSeleccionado);
            });
        });
    </script>
@endsection
