@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $businessCertification->name ?? __('Show') . " " . __('Business Certification') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Business Certification</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('business-certifications.index') }}"> {{ __('Atrás') }}</a>
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
                                    <strong>Certification Id:</strong>
                                    {{ $businessCertification->certification_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Business Id:</strong>
                                    {{ $businessCertification->business_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Delivery:</strong>
                                    {{ $businessCertification->delivery }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Activated:</strong>
                                    {{ $businessCertification->is_activated }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
