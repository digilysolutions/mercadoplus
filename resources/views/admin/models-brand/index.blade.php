@extends('layouts.app-admin')
@section('title-header-admin')
    Modelos de la Marca
@endsection

@section('content-admin')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap align-items-center  mb-4">
                    <div>
                        <h4 class="mb-3">Modelos</h4>
                        <p class="mb-0">Los modelos se pueden gestionar desde esta sección.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"> <button class="btn btn-secondary" data-toggle="modal" data-target="#new-model"> Nuevo
                    Modelo</button>
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
                                                style="width: 63.8438px;">Marca</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Características</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Descripción</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Año</th>

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
                                        @foreach ($models as $model)
                                            <tr class="odd">
                                                <td class="">
                                                    <div class="checkbox d-inline-block">
                                                        <input type="checkbox" class="checkbox-input"
                                                            id="{{ $model['name'] }}">

                                                    </div>
                                                </td>
                                                <td>{{ $model['name'] }}</td>
                                                <td>{{ $model['brand']['name'] }}</td>
                                                <td>{{ $model['characteristics'] }}</td>
                                                <td>{{ $model['description'] }}</td>
                                                <td>{{ $model['year'] }}</td>
                                                <td>
                                                    @if ($model['is_activated'] == 1)
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
                                                                data-target="#modelShowModal{{ $model['id'] }}"
                                                                data-id="{{ $model['id'] }}"></i></a>
                                                        <a class="badge bg-success mr-2" data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Editar" href="#"><i
                                                                class="ri-pencil-line mr-0 btn-edit" data-toggle="modal"
                                                                data-target="#modelEditModal{{ $model['id'] }}"
                                                                data-id="{{ $model['id'] }}"></i></a>
                                                        <a class="badge bg-warning mr-2 " data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Eliminar" href="#"><i
                                                                class="ri-delete-bin-line mr-0 btn-delete"
                                                                data-id="{{ $model['id'] }}" data-toggle="modal"
                                                                data-target="#deleteModal_{{ $model['id'] }}"></i></a>
                                                    </div>
                                                </td>
                                            </tr>


                                            <!-- Modal para Editar la categoría -->
                                            @include('admin.models-brand.show-modal')
                                            <!-- Modal para Editar la marca -->
                                            @include('admin.models-brand.update-modal')
                                            <!-- Modal para eliminar la marca -->
                                            @include('admin.models-brand.delete-modal')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <!---- Modl para Adicinar la marca -->
        @include('admin.models-brand.add-modal')
    @endsection

    @section('js')
        <script src="{{ asset('includes/admin/model-admin.js') }}"></script>
    @endsection
