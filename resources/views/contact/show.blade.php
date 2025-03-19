@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $contact->name ?? __('Show') . " " . __('Contact') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Contact</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('contacts.index') }}"> {{ __('Atrás') }}</a>
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
                                    <strong>Email:</strong>
                                    {{ $contact->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Family Number:</strong>
                                    {{ $contact->family_number }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Alternate Number:</strong>
                                    {{ $contact->alternate_number }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mobile:</strong>
                                    {{ $contact->mobile }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Phone:</strong>
                                    {{ $contact->phone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Location Id:</strong>
                                    {{ $contact->location_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Activated:</strong>
                                    {{ $contact->is_activated }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
