@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $user->name ?? __('Mostrar') . ' ' . __('Usuario') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"> {{ __('Atrás') }}</a>
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
                @endif<div class="card-body bg-white">


                        <div class="form-group mb-2 mb20">
                            <strong>Código:</strong>
                            {{ $user->id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre y Apellidos:</strong>
                            {{ $user->person->name }} {{ $user->person->lastname }}
                        </div>
                        @if ($user->person && $user->person->student && $user->person->student->course)
                            {{ $user->person->student->course }}
                        @else
                            <p>No hay información de curso disponible.</p>
                        @endif
                        <div class="form-group mb-2 mb20">
                            <strong>Centro de estudio:</strong>
                            @if ($user->person && $user->person->student && $user->person->student->studyCenter)
                                {{ $user->person->student->studyCenter->name }}
                            @else
                                <p>No hay información del centro de estudio disponible.</p>
                            @endif
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Teléfono:</strong>
                            {{ $user->person->phone }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Teléfono:</strong>
                            {{ $user->person->email }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Usuario:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Membresía:</strong>
                            @if ($user->person && $user->person->student && $user->person->student->membership)
                            {{ $user->person->student->membership->name }}
                            @else
                            <p>No hay información membresía disponible.</p>
                        @endif
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Activado:</strong>
                            @if ($user->activated == 1)
                                Si
                            @else
                                No
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
