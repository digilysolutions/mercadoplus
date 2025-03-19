@extends('layouts.app-admin')
@section('title-header-admin')
   PLataforma Mercado PLUS
@endsection
@section('content-admin')
<div class="wrapper">
    <div class="container">
       <div class="row no-gutters height-self-center">
          <div class="col-sm-12 text-center align-self-center">
             <div class="iq-error position-relative">
                   <img src="{{ asset('img/error/404.png') }}" class="img-fluid iq-error-img" alt="">
                   <h2 class="mb-0 mt-4">¡Ups! Esta página no se encontró. </h2>
                   <p>La página solicitada no existe.</p>
                   <a class="btn btn-primary d-inline-flex align-items-center mt-3" href="/admin/login"><i class="ri-home-4-line"></i>Volver al Inicio</a>
             </div>
          </div>
       </div>
 </div>
@endsection
