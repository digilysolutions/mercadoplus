@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $location->name ?? __('Show') . " " . __('Location') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} {{__('Location')}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('locations.index') }}"> {{ __('Atrás') }}</a>
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
                @endif

                <div class="d-flex align-items-center mb-3">

                    <div class="ml-5 mt-5 ">
                        <h4 class="mb-1" id="name">
                            {{ $location['name'] }}</h4>
                        <p>{{ $location['address'] }}</p>
                        <p>{{ $location['municipality_name'] }}</p>
                        <p>{{ $location['country_name'] }}</p>
                        <p><b class="text-warning">Código Postal: </b>{{ $location['zip_code'] }}</p>

                        <p><b class="text-warning">Punto de Referencia: </b>{{ $location['landmark'] }}</p>
                        <p class="mb-1"> <b class="text-warning">Activado:</b>
                            @if ($location['is_activated'])
                                Si
                            @else
                                No
                            @endif
                        </p>
                        <p><b class="text-warning">Descripción: </b>{{ $location['description'] }}</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
