@extends('layouts.app-admin')
@section('title-header-admin')
   PLataforma Mercado PLUS
@endsection
@section('content-admin')


       <div class="container">
          <div class="row align-items-center justify-content-center height-self-center">
             <div class="col-lg-8">
                <div class="card auth-card">
                   <div class="card-body p-0">
                      <div class="d-flex align-items-center auth-content">
                         <div class="col-lg-7 align-self-center">
                            <div class="p-3">
                               <img src="{{ asset('admin/images/page-img/acces-denegado.webp') }}" class="img-fluid" width="250" alt="">
                               <h2 class="mt-3 mb-0">ACCESO DENEGADO</h2>
                               <p class="cnf-mail mb-1">No tienes acceso a la página o servicio solicitado.</p>
                               <div class="d-inline-block w-100">
                                  <a href="/login" class="btn btn-primary mt-3">Volver a inicio</a>
                               </div>
                            </div>
                         </div>
                         <div class="col-lg-5 content-right">
                            <img src="{{ asset('img/login/01.png') }}" class="img-fluid image-right" alt="">
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>


@endsection
