@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $discountsByWeight->name ?? __('Show') . " " . __('Discounts By Weight') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Discounts By Weight</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('discounts-by-weights.index') }}"> {{ __('Atrás') }}</a>
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
                                    {{ $discountsByWeight->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Activated:</strong>
                                    {{ $discountsByWeight->is_activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Discount Type:</strong>
                                    {{ $discountsByWeight->discount_type }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Weight:</strong>
                                    {{ $discountsByWeight->weight }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Unit Id:</strong>
                                    {{ $discountsByWeight->unit_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Discount Amount:</strong>
                                    {{ $discountsByWeight->discount_amount }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Start Date:</strong>
                                    {{ $discountsByWeight->start_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>End Date:</strong>
                                    {{ $discountsByWeight->end_date }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
