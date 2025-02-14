@extends('layouts.app-admin')
@section('title-header-admin')
    Categorías
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
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap align-items-center  mb-4">
                    <div>
                        <h4 class="mb-3">Categorías del producto</h4>
                        <p class="mb-0">Las categorías de producto de tu tienda se pueden gestionar desde aquí.</p>
                    </div>

                </div>

            </div>
            <div class="col-lg-4"> <button class="btn btn-secondary" data-toggle="modal" data-target="#new-category"> Nueva
                    Categoría</button></div>
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
                                            <th class="sorting sorting_desc" tabindex="0"
                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                aria-label="Product: activate to sort column ascending"
                                                style="width: 154.297px;" aria-sort="descending">Imagen</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Nombre</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Category: activate to sort column ascending"
                                                style="width: 70.4531px;">Moneda</th>


                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Brand Name: activate to sort column ascending"
                                                style="width: 94.4688px;">Productos</th>

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
                                        @foreach ($categories as $category)
                                            <tr class="odd">
                                                <td class="">
                                                    <div class="checkbox d-inline-block">
                                                        <input type="checkbox" class="checkbox-input"
                                                            id="{{ $category['name'] }}">

                                                    </div>
                                                </td>
                                                <td class="sorting_1">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ $category['path_image'] }}"
                                                            class="img-fluid rounded avatar-100 "
                                                            alt="{{ $category['name'] }}" accept=".jpg,.jpeg,.png,.webp" />

                                                    </div>
                                                </td>
                                                <td>{{ $category['name'] }}</td>
                                                <td>{{ $category['code_currency_default'] }}</td>


                                                <td>{{ count($category['products']) }}</td>
                                                <td>
                                                    @if ($category['is_activated'] == 1)
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
                                                                data-target="#categoryShowModal{{ $category['id'] }}"
                                                                data-id="{{ $category['id'] }}"></i></a>

                                                        <a class="badge bg-warning mr-2 " data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Eliminar" href="#"><i
                                                                class="ri-delete-bin-line mr-0 btn-delete"
                                                                data-id="{{ $category['id'] }}" data-toggle="modal"
                                                                data-target="#deleteModal_{{ $category['id'] }}"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal Show Categoria-->
                                            @include('admin.categories.show-modal')

                                            <!-- Modal para eliminar la categoría -->
                                            @include('admin.categories.delete-modal')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <!-- Page end  -->
        </div>
    @endsection
    @include('admin.categories.add-modal')




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
