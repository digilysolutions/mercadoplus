@extends('layouts.app-admin')
@section('title-header-admin')
    PLataforma Mercado PLUS
@endsection
@section('content-admin')
    <div class="col-lg-12">
        <div class="card card-transparent card-block card-stretch card-height border-none">
            <div class="card-body p-3 mt-lg-2 mt-3">
                <h3 class="mb-3">¡Bienvenido al Dashboard de Usuario!</h3>
                <p class="mb-0 mr-4">Aquí podrás visualizar ¡Explora y aprende!</p>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <a href="{{ route('items.index', ['name' => 'Resueltos']) }}">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-info-light">
                                    <img src="{{ asset('img/47.jpg') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Items Resueltos</p>
                                    <h4>0</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-info iq-progress progress-1" data-percent="85">
                                </span>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4">
                    <a href="{{ route('items.index', ['name' => 'No Resueltos']) }}">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-danger-light">
                                    <img src="{{ asset('img/a4.png') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Items no Resueltos</p>
                                    <h4>0</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-danger iq-progress progress-1" data-percent="70">
                                </span>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4">
                    <a href="{{ route('examens.index', ['name' => 'Examenes Resueltos']) }}">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-success-light">
                                        <img src="{{ asset('img/3.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Exámenes Resueltos</p>
                                        <h4>0</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="75">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4">
                    <a href="{{ route('examens.index', ['name' => 'Examenes no Resueltos']) }}">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-info">
                                    <img src="{{ asset('img/02.png') }}" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Exámenes no Resueltos</p>
                                    <h4>0</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-success iq-progress progress-1" data-percent="75">
                                </span>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
