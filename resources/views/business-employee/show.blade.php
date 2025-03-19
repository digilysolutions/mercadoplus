@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $businessEmployee->name ?? __('Show') . " " . __('Business Employee') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Business Employee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('business-employees.index') }}"> {{ __('Atrás') }}</a>
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
                                    <strong>Is Activated:</strong>
                                    {{ $businessEmployee->is_activated }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Employee Id:</strong>
                                    {{ $businessEmployee->employee_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Business Id:</strong>
                                    {{ $businessEmployee->business_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Hiredate:</strong>
                                    {{ $businessEmployee->hireDate }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email Business:</strong>
                                    {{ $businessEmployee->email_business }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Person Statuses Id:</strong>
                                    {{ $businessEmployee->person_statuses_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Person Statuses Message:</strong>
                                    {{ $businessEmployee->person_statuses_message }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jobtitle:</strong>
                                    {{ $businessEmployee->jobTitle }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Department:</strong>
                                    {{ $businessEmployee->department }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Role:</strong>
                                    {{ $businessEmployee->role }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Salary:</strong>
                                    {{ $businessEmployee->salary }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
