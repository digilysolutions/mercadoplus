@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $business->name ?? __('Show') . " " . __('Business') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Business</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('businesses.index') }}"> {{ __('Atrás') }}</a>
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
                                    <strong>Name:</strong>
                                    {{ $business->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Description:</strong>
                                    {{ $business->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Industry:</strong>
                                    {{ $business->industry }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Website:</strong>
                                    {{ $business->website }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Activated:</strong>
                                    {{ $business->is_activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Logo:</strong>
                                    {{ $business->logo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Currency Id:</strong>
                                    {{ $business->currency_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Contact Id:</strong>
                                    {{ $business->contact_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Owner Id:</strong>
                                    {{ $business->owner_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
