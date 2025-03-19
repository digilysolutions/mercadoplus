@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Create') }}  {{__('Delivery Zones')}}
@endsection

@section('content-admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }}  {{__('Delivery Zones')}}</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('delivery-zones.index') }}"> {{ __('Atrás') }}</a>
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
                        <form method="POST" action="{{ route('delivery-zones.store') }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            @csrf

                            @include('delivery-zone.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script src="{{ asset('includes/admin/deliveryZone-admin.js') }}"></script>
<script>

    $(document).ready(function() {

        $('.delivery_time').on('input', function() {

            const inputValue = $(this).val();
            const $select = $('.time_unit');
            // Limpiar el select
            $select.empty();

            // Si el valor no es un número o es 0
            if (isNaN(inputValue) || inputValue == 0) {
                $select.append('<option value="">-- Seleccione --</option>');
                return;
            }

            // Convertir a número
            const numberInput = parseInt(inputValue, 10);

            // Comprobar el rango del número
            if (numberInput > 1) {
                $select.append('<option value="Horas">Horas</option>');
                $select.append('<option value="Días">Días</option>');
                $select.append('<option value="Meses">Meses</option>');
                $select.append('<option value="Años">Años</option>');
            } else {
                $select.append('<option value="Hora">Hora</option>');
                $select.append('<option value="Día">Día</option>');
                $select.append('<option value="Mes">Mes</option>');
                $select.append('<option value="Año">Año</option>');
            }
        });
    });
</script>
@endsection
