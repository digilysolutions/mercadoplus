@extends('layouts.app-admin')
@section('title-header-admin')
    Monedas
@endsection

@section('content-admin')
    @php
        $defualt_currency = 0;
        $arrayCurrencies = [];
        $name_defualt_currency =" " ;

    @endphp
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap align-items-center  mb-4">
                    <div>
                        <h4 class="mb-3">Monedas</h4>
                        <p class="mb-0">Las mondas por paises se pueden gestionar desde esta sección.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"> <button class="btn btn-secondary" data-toggle="modal" data-target="#new-countrycourrency">
                    Nueva</button>
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
                                                style="width: 63.8438px;">País</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Moneda</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Código</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Tasa de Cambio</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Brand Name: activate to sort column ascending"
                                                style="width: 94.4688px;">Activo</th>


                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Action: activate to sort column ascending"
                                                style="width: 103.125px;">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        @foreach ($countries_currencies as $countrycurrency)
                                            {{ $arrayCurrencies[($countrycurrency['currency']['currency'])] = $countrycurrency['currency']['id'] }}
                                           
                                            <tr class="odd">
                                                <td class="">
                                                    <div class="checkbox d-inline-block">
                                                        <input type="checkbox" class="checkbox-input"
                                                            id="{{ $countrycurrency['id'] }}">

                                                    </div>
                                                </td>
                                                <td>{{ $countrycurrency['country']['name'] }}</td>
                                                <td>{{ $countrycurrency['currency']['currency'] }}</td>
                                                <td>

                                                    <div
                                                        class="badge
                                                         @if ($countrycurrency['code_currency_default'])  badge-danger
                                                         @php $defualt_currency = 1; $name_defualt_currency = $countrycurrency['currency']['code'] ; @endphp
                                                        @else badge-light @endif ">
                                                        {{ $countrycurrency['currency']['code'] }}</div>
                                                </td>
                                                <td>{{ $countrycurrency['currency']['symbol'] }}{{ $countrycurrency['exchange_rate'] }}
                                                </td>
                                                <td>
                                                    @if ($countrycurrency['is_activated'] == 1)
                                                        Si
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center list-action">
                                                        <a class="badge badge-info mr-2" data-toggle="tooltip"
                                                            data-placement="top" title="" data-original-title="Ver"
                                                            href="#"><i class="ri-eye-line mr-0" data-toggle="modal"
                                                                data-target="#countrycurrencyShowModal{{ $countrycurrency['id'] }}"
                                                                data-id="{{ $countrycurrency['id'] }}"></i></a>
                                                        <a class="badge bg-success mr-2" data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Editar" href="#"><i
                                                                class="ri-pencil-line mr-0 btn-edit" data-toggle="modal"
                                                                data-target="#countrycurrencyEditModal{{ $countrycurrency['id'] }}"
                                                                data-id="{{ $countrycurrency['id'] }}"></i></a>
                                                        <a class="badge bg-warning mr-2 " data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Eliminar" href="#"><i
                                                                class="ri-delete-bin-line mr-0 btn-delete"
                                                                data-id="{{ $countrycurrency['id'] }}"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal_{{ $countrycurrency['id'] }}"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!---- Modl para editar  tasa de cambio -->
                                            @include('admin.currency-country.update-modal')
                                            @include('admin.currency-country.delete-modal')
                                            <!-- Modal para mostrar tasa de cambio-->
                                            @include('admin.currency-country.show-modal')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <!---- Modl para adicionar tasa de cambio -->
        @include('admin.currency-country.add-modal')

    @endsection

    @section('js')
        <script src="{{ asset('includes/admin/country-currency-admin.js') }}"></script>
    @endsection
