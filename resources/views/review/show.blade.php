@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $review->name ?? __('Show')}} {{__('Review') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} {{__('Review') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('reviews.index') }}"> {{ __('Atrás') }}</a>
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
                                    <strong>{{__('Business')}}/{{__('Product')}}:</strong>
                                    @if ($review->product_id == null)
                                    <label class="mt-2 badge border border-primary text-primary mt-2">
                                        Negocio</label>
                                @else
                                    <label class="mt-2 badge border border-secondary text-secondary mt-2">
                                        Producto</label>
                                @endif
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('Comment')}}:</strong>
                                    {{ $review->comment }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('Date')}}:</strong>
                                    {{ $review->date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('Writer')}}:</strong>
                                    {{ $review->person->first_name }} {{ $review->person->last_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('is_activated')}}:</strong>
                                    @if ($review->is_activated == 1)
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
