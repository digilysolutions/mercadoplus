@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Create') }} {{__('Category')}}
@endsection
@section('css')
    <style>
        label {
            display: block;
            margin: 10px 0 5px;
        }

        input {
            margin-bottom: 15px;
        }
    </style>
@endsection
@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }}  {{__('Category')}}</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('product-categories.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                        <form method="POST" action="{{ route('product-categories.store') }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            @csrf

                            @include('product-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
        <script src="{{ asset('includes/admin/categories-admin.js') }}"></script>
        <script src="{{ asset('includes/admin/script.js') }}"></script>
        <script>
            $(document).ready(function() {
                // Cargar las monedas desde el select
                const currencies = $('#baseCurrency option').map(function() {
                    return $(this).val();
                }).get();

                $('#baseCurrency').change(function() {
                    const selectedCurrency = $(this).val();
                    $('#exchangeRatesContainer').show(); // Mostrar el contenedor de tasas de cambio
                    $('#exchangeRates').empty(); // Limpiar tasas de cambio previamente mostradas

                    currencies.forEach(currency => {
                        if (currency !== selectedCurrency) {
                            // Crear elementos de input para las monedas seleccionadas
                            $('#exchangeRates').append(`
                    <label for="${currency}">${currency}:</label>
                    <input class="form-control" name="yYYYy" type="number" id="${currency}" step="0.01" placeholder="Introduce tasa de cambio"><br>
                `);
                        }
                    });
                    // Crear un arreglo con las monedas excluyendo la seleccionada
                    updateCurrencyArray(selectedCurrency);
                });


                function updateCurrencyArray(selectedCurrency) {
                    // Crear un arreglo de monedas excluyendo la moneda seleccionada
                    const currencyData = currencies.filter(currency => currency !== selectedCurrency);

                    // Llenar el campo oculto con el arreglo convertido a JSON
                    $('#currencyArray').val(JSON.stringify(currencyData));
                }
            });
        </script>
    @endsection
