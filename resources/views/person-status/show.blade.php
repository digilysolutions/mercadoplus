@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $personStatus->name ?? __('Show') . " " . __('Person Status') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Person Status</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('person-statuses.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $personStatus->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Description:</strong>
                                    {{ $personStatus->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Activated:</strong>
                                    {{ $personStatus->is_activated }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
