@extends('layouts.app-admin')
@section('title-header-admin')
    Domocilio
@endsection

@section('content-admin')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap align-items-center  mb-4">
                    <div>
                        <h4 class="mb-3">Domocilio </h4>
                        <p class="mb-0">El envío por zona se puede gestionar aquí.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"> <button class="btn btn-secondary" data-toggle="modal" data-target="#new-deliveryZones"> Nuevo
                    domicilio</button>
            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="data-tables table mb-0 tbl-server-info dataTable no-footer"
                                    id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data" role="row">
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="

                                            : activate to sort column ascending"
                                                style="width: 16.2812px;">
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox1">
                                                    <label for="checkbox1" class="mb-0"></label>
                                                </div>
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Localidad</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="attribute Name: activate to sort column ascending"
                                                style="width: 94.4688px;">Tiempo</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="attribute Name: activate to sort column ascending"
                                                style="width: 94.4688px;">Precio</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="attribute Name: activate to sort column ascending"
                                                style="width: 94.4688px;">Activado</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Action: activate to sort column ascending"
                                                style="width: 103.125px;">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        @foreach ($deliveryZones as $deliveryZone)
                                            <tr class="odd">
                                                <td class="">
                                                    <div class="checkbox d-inline-block">
                                                        <input type="checkbox" class="checkbox-input"
                                                            id="{{ $deliveryZone['id'] }}">
                                                    </div>
                                                </td>
                                                <td>{{ $deliveryZone['location']['name'] }}</td>
                                                <td>
                                                    {{ $deliveryZone['delivery_time'] }} {{ $deliveryZone['time_unit'] }}
                                                </td>
                                                <td>
                                                    $ {{ $deliveryZone['price'] }} {{ $currency['currency']['code'] }}
                                                </td>
                                                <td>
                                                    @if ($deliveryZone['is_activated'] == 1)
                                                        Si
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center list-action">

                                                        <a class="badge bg-success mr-2" data-toggle="tooltip"
                                                            data-placement="top" title="" data-original-title="Editar"
                                                            href="#"><i class="ri-pencil-line mr-0 btn-edit"
                                                                data-toggle="modal"
                                                                data-target="#deliveryZoneEdit{{ $deliveryZone['id'] }}"
                                                                data-id="{{ $deliveryZone['id'] }}"></i></a>
                                                        <a class="badge bg-warning mr-2 " data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Eliminar" href="#"><i
                                                                class="ri-delete-bin-line mr-0 btn-delete"
                                                                data-id="{{ $deliveryZone['id'] }}" data-toggle="modal"
                                                                data-target="#deleteModal_{{ $deliveryZone['id'] }}"></i></a>
                                                    </div>
                                                </td>
                                            </tr>


                                            @include('admin.deliveryZones.delete-modal')
                                            @include('admin.deliveryZones.update-modal')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        @include('admin.deliveryZones.add-deliveryZones')
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
