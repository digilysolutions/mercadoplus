@extends('layouts.app-admin')

@section('title-header-admin')
    Tiempo en Plataforma
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
                            <img src="{{ asset('img/login/mail.png') }}" class="img-fluid" width="80" alt="">
                            <h2 class="mt-3 mb-0">18 Horas y 25 minutos !</h2>
                            <p class="cnf-mail mb-1">Estimado {{ auth()->user()->person->name }},

                                Nos complace informarte que has pasado un total de [18 horas y 25 minutos] en
                                nuestra
                                plataforma. Este tiempo refleja tu dedicación y esfuerzo en tus estudios.

                                Recuerda que cada minuto que inviertes aquí te acerca más a tus objetivos
                                académicos.
                                ¡Continúa así!</p>

                         </div>
                      </div>
                      <div class="col-lg-5 content-right">
                         <img src="{{asset('img/login/01.png')}}" class="img-fluid image-right" alt="">
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>




@endsection
