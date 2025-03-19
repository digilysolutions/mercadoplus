@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $customer->name ?? __('Show') . " " . __('Customer') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Customer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('customers.index') }}"> {{ __('Atrás') }}</a>
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
                                    <strong>Person Id:</strong>
                                    {{ $customer->person_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Person Statuses Message:</strong>
                                    {{ $customer->person_statuses_message }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Billingaddress Id:</strong>
                                    {{ $customer->billingAddress_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Shippingaddress Id:</strong>
                                    {{ $customer->shippingAddress_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Creditcardnumber:</strong>
                                    {{ $customer->creditCardNumber }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Creditcardexpirationdate:</strong>
                                    {{ $customer->creditCardExpirationDate }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Creditlimit:</strong>
                                    {{ $customer->creditLimit }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Activated:</strong>
                                    {{ $customer->is_activated }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
