@extends('layouts.app-admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
@section('title-header-admin')
    Reseñas
@endsection

@section('content-admin')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap align-items-center  mb-4">
                    <div>
                        <h4 class="mb-3">Reseña</h4>
                    </div>
                </div>
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
                                            <th class="sorting autor-column"  tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 300px;">Autor</th>
                                            <th class="sorting comment-column" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width:auto;">Comentario</th>
                                            <th class="sorting product-business-column" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 20px;">Negocio/Producto</th>
                                                <th class="sorting date-column" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 150px;">Enviado el</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Action: activate to sort column ascending"
                                                style="width: 100px;">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        @foreach ($reviews as $review)
                                            <tr class="odd">                                               
                                                <td class="autor-column">{{ $review['writer']['first_name'] }} {{ $review['writer']['last_name'] }}</td>
                                                <td class="comment-column">{{ $review['comment'] }}</td>
                                                <td class="text-center product-business-column"> @if ($review['product_id']==null) <label class="mt-2 badge border border-primary text-primary mt-2"> Negocio</label> @else  <label class="mt-2 badge border border-secondary text-secondary mt-2"> Producto</label>
                                                        
                                                    @endif  </td>
                                                    <td class="date-column">{{ $review['date'] }}</td>    
                                                <td>
                                                    <div class="d-flex align-items-center list-action">
                                                        <a class="badge badge-info mr-2" data-toggle="tooltip"
                                                            data-placement="top" title="" data-original-title="Ver"
                                                            href="#"><i class="ri-eye-line mr-0" data-toggle="modal"
                                                                data-target="#reviewShowModal{{ $review['id'] }}"
                                                                data-id="{{ $review['id'] }}"></i></a>
                                                        <a class="badge bg-success mr-2" data-toggle="tooltip"
                                                            data-placement="top" title="" data-original-title="Editar"
                                                            href="#"><i class="ri-pencil-line mr-0 btn-edit"
                                                                data-toggle="modal"
                                                                data-target="#reviewEditModal{{ $review['id'] }}"
                                                                data-id="{{ $review['id'] }}"></i></a>
                                                        <a class="badge bg-warning mr-2 " data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Eliminar" href="#"><i
                                                                class="ri-delete-bin-line mr-0 btn-delete"
                                                                data-id="{{ $review['id'] }}" data-toggle="modal"
                                                                data-target="#deleteModal_{{ $review['id'] }}"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                           
                                          @include('admin.reviews.show-modal')
                                          @include('admin.reviews.update-modal')
                                          @include('admin.reviews.delete-modal')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    @endsection

    @section('js')
    <script src="{{ asset('includes/admin/review-admin.js') }}"></script>
    @endsection
