@extends('layouts.app-admin')
@section('title-header-admin')
    Productos
@endsection

@section('content-admin')
    <div class="row">
        <div class="col-sm-12">
            <table class="data-tables table mb-0 tbl-server-info dataTable no-footer" id="DataTables_Table_0" role="grid"
                aria-describedby="DataTables_Table_0_info">
                <thead class="bg-white text-uppercase">
                    <tr class="ligth ligth-data" role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" aria-sort="ascending"
                            aria-label="




            : activate to sort column descending" style="width: 160.359px;">
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox1">
                                <label for="checkbox1" class="mb-0"></label>
                            </div>
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Product: activate to sort column ascending" style="width: 1000px;">Producto</th>

                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Category: activate to sort column ascending" style="width: 354.656px;">Categoría
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Cost: activate to sort column ascending" style="width: 268.828px;">Costo</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Price: activate to sort column ascending" style="width: 299.766px;">Precio</th>

                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Brand Name: activate to sort column ascending" style="width: 446.344px;">Marca
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Quantity: activate to sort column ascending" style="width: 338.203px;">Creado</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Action: activate to sort column ascending" style="width: 429.234px;"></th>
                    </tr>
                </thead>
                <tbody class="ligth-body">

                    @foreach ($products as $product)
                        <tr class="odd">
                            <td class="sorting_1">
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox2">
                                    <label for="checkbox2" class="mb-0"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $product['outstanding_image'] }}" class="img-fluid rounded avatar-50 mr-3"
                                        alt="image">
                                    <div>
                                        {{ $product['name'] }}
                                        <p class="mb-0"><small>
                                                @if ($product['sku'])
                                                    SKU:{{ $product['sku'] }}
                                                @endif
                                            </small></p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                @foreach ($product['categories'] as $category)
                                    <span class="mt-2 badge badge-primary">{{ $category['name'] }} </span>
                                @endforeach

                            </td>
                            <td>${{ $product['purchase_price'] ?? 0 }}</td>
                            <td>${{ $product['sale_price'] ?? 0 }}</td>
                            <td>
                                @if ($product['brand'] !== null && $product['brand']['name'] !== null)
                                    {{ $product['brand']['name'] }}
                                @endif
                            </td>

                            <td>{{ $product['created_at'] }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="View"
                                        href="{{ route('product.show', ['id' => $product['id']]) }}"><i
                                            class="ri-eye-line mr-0"></i></a>
                                    <a   href="{{ route('product.edit', ['id' => $product['id']]) }}" class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Edit" href="#"><i
                                            class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-warning mr-2 " data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Eliminar" href="#"><i
                                            class="ri-delete-bin-line mr-0 btn-delete" data-id="{{ $product['id'] }}"
                                            data-toggle="modal" data-target="#deleteModal_{{ $product['id'] }}"></i></a>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal para eliminar la unidad base -->
                        @include('admin.products.delete-modal')
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>
@endsection




@section('js')
<script src="{{ asset('includes/admin/product-admin.js') }}"></script>
@endsection
