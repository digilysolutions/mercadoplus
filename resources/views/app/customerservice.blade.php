@extends('layouts.app')
@section('header-title')
    Isla de la Juventud - Servicio al Cliente
@endsection
@section('content')
 <!-- Breadcrumb Start -->
 <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-orange-mobile" href="/">Inicio</a>
                <span class="breadcrumb-item text-dark-mobile active ">Atención al Cliente</span>
            </nav>
        </div>
    </div>
</div>
    <div class="col-lg-12 h-auto mb-30">
        <div class="h-100 bg-light p-30">
            <h3>Te damos la bienvenida al Servicio al Cliente de Mercado PLUS</h3>
            <h5>Queremos que tengas la mejor experiencia de compra posible. Si tienes preguntas, inquietudes o necesitas
                ayuda, aquí encontrarás la información necesaria para resolver tus problemas rápidamente.

            </h5>


            <h5 class="mb-4"> ¿Con qué te gustaría recibir ayuda hoy?</h5>
        </div>
    </div>

    <div class="row px-xl-5 pb-3">
        <div class="col-lg-6 col-md-6 col-sm-6 pb-1">
            <a class="text-decoration-none" href="">
                <div class="cat-item d-flex align-items-center mb-4">
                    <div class="overflow-hidden" style="width: 100px; height: 100px">
                        <img class="img-fluid" src="{{ asset('img/serviciocliente/entrega.png') }}" alt="">
                    </div>
                    <div class="flex-fill pl-3">
                        <h6> Entrega, pedido o recogida de productos</h6>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 pb-1">
            <a class="text-decoration-none" href="">
                <div class="cat-item img-zoom d-flex align-items-center mb-4">
                    <div class="overflow-hidden" style="width: 100px; height: 100px">
                        <img class="img-fluid" src="{{ asset('img/serviciocliente/metodopago.png') }}" alt="">
                    </div>
                    <div class="flex-fill pl-3">
                        <h6> Métodos de pago</h6>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 pb-1">
            <a class="text-decoration-none" href="">
                <div class="cat-item img-zoom d-flex align-items-center mb-4">
                    <div class="overflow-hidden" style="width: 100px; height: 100px">
                        <img class="img-fluid" src="{{ asset('img/serviciocliente/direccion.png') }}" alt="">
                    </div>
                    <div class="flex-fill pl-3">
                        <h6> Dirección, seguridad y privacidad</h6>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 pb-1">
            <a class="text-decoration-none" href="">
                <div class="cat-item img-zoom d-flex align-items-center mb-4">
                    <div class="overflow-hidden" style="width: 100px; height: 100px">
                        <img class="img-fluid" src="{{ asset('img/serviciocliente/otros.jpg') }}" alt="">
                    </div>
                    <div class="flex-fill pl-3">
                        <h6> Otros</h6>

                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
