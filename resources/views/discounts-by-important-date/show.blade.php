@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $discountsByImportantDate->name ?? __('Show') . " " . __('Discounts By Important Date') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Discounts By Important Date</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('discounts-by-important-dates.index') }}"> {{ __('Atrás') }}</a>
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
                                    {{ $discountsByImportantDate->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Activated:</strong>
                                    {{ $discountsByImportantDate->is_activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Discount Type:</strong>
                                    {{ $discountsByImportantDate->discount_type }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Discount Amount:</strong>
                                    {{ $discountsByImportantDate->discount_amount }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Start Date:</strong>
                                    {{ $discountsByImportantDate->start_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>End Date:</strong>
                                    {{ $discountsByImportantDate->end_date }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
