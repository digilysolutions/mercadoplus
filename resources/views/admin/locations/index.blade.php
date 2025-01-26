@extends('layouts.app-admin')
@section('title-header-admin')
    Unidad Base
@endsection

@section('content-admin')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap align-items-center  mb-4">
                    <div>
                        <h4 class="mb-3">Zona</h4>
                        <p class="mb-0">Las Zonas se pueden gestionar desde esta sección.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"> <button class="btn btn-secondary" data-toggle="modal" data-target="#new-location">Nueva
                    Zona</button>
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
                                                style="width: 63.8438px;">Nombre</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Municipio</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 200px;">Dirección</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width:50px;">Punto Referencia</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Brand Name: activate to sort column ascending"
                                                style="width: 20px;">Activo</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Action: activate to sort column ascending"
                                                style="width: 103.125px;">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        @foreach ($locations as $location)
                                            <tr class="odd">
                                                <td class="">
                                                    <div class="checkbox d-inline-block">
                                                        <input type="checkbox" class="checkbox-input"
                                                            id="{{ $location['id'] }}">

                                                    </div>
                                                </td>
                                                <td>{{ $location['name'] }}</td>
                                                <td>{{ $location['municipality_name'] }}</td>
                                                <td>{{ $location['address'] }}</td>
                                                <td>{{ $location['landmark'] }}</td>
                                                <td>
                                                    @if ($location['is_activated'] == 1)
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
                                                                data-target="#locationsShowModal{{ $location['id'] }}"
                                                                data-id="{{ $location['id'] }}"></i></a>
                                                        <a class="badge bg-success mr-2" data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Editar" href="#"><i
                                                                class="ri-pencil-line mr-0 btn-edit" data-toggle="modal"
                                                                data-target="#locationEditModal{{ $location['id'] }}"
                                                                data-id="{{ $location['id'] }}"></i></a>
                                                        <a class="badge bg-warning mr-2 " data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Eliminar" href="#"><i
                                                                class="ri-delete-bin-line mr-0 btn-delete"
                                                                data-id="{{ $location['id'] }}" data-toggle="modal"
                                                                data-target="#deleteModal_{{ $location['id'] }}"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal Show location base-->
                                            @include('admin.locations.show-modal')
                                            <!-- Modal para Editar la unit base -->
                                            @include('admin.locations.update-modal')
                                            <!-- Modal para eliminar la unidad base -->
                                            @include('admin.locations.delete-modal')

                                            <!-- Modal para Editar la categoría -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <!---- Modl para Adicinar la unidad base -->
        @include('admin.locations.add-modal')
    @endsection

    @section('js')
        <script src="{{ asset('includes/admin/location-admin.js') }}"></script>
    @endsection
