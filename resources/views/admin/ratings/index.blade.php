@extends('layouts.app-admin')
@section('title-header-admin')
    Puntuación
@endsection
@section('css')
    <style>
        .estrella {
            font-size: 30px;
            color: #d45805;
            transition: color 0.3s, transform 0.3s;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .estrella.pintada {
            color: #d45805;
            /* Color cuando está pintada */
        }

        .estrella.mitad {
            background: linear-gradient(to right, #d45805 50%, gray 50%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            width: 30px;
            overflow: hidden;
        }
    </style>
@endsection

@section('content-admin')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap align-items-center  mb-4">
                    <div>
                        <h4 class="mb-3">Puntuación</h4>

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

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Autor</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Puntuación</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Code: activate to sort column ascending"
                                                style="width: 63.8438px;">Producto</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Brand Name: activate to sort column ascending"
                                                style="width: 94.4688px;">Activo</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        @foreach ($ratings as $rating)
                                            <tr class="odd">
                                                <td> {{ $rating['person']['first_name'] }}</td>
                                                <td>
                                                    <div class="estrellas align-items-center justify-content-center "
                                                        id="estrellas">
                                                        @for ($index = 0; $index < $rating['rating']; $index++)
                                                            <span class="estrella" data-valor="{{ $index }}">☆</span>
                                                        @endfor
                                                        <span style=" font-size: 20px;">({{ $rating['rating'] }})</span>

                                                    </div>

                                                </td>
                                                <td> {{ $rating['product']['name'] }}</td>
                                                <td>
                                                    @if ($rating['is_activated'] == 1)
                                                        Si
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                
                                            </tr>
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
        <script>
            function pintarEstrellas(puntuacion) {
                const estrellas = document.querySelectorAll('#estrellas .estrella');
                estrellas.forEach(estrella => {
                    const valor = parseFloat(estrella.getAttribute('data-valor'));
                    estrella.classList.remove('pintada', 'mitad'); // Limpiar clases anteriores

                    if (valor <= puntuacion) {
                        estrella.classList.add('pintada');
                    } else if (valor - 0.5 === puntuacion) {
                        estrella.classList.add('mitad');
                    }
                });
            }

            // Ejemplo: Cambiar la puntuación a 3.5
            const puntuacionActual = 3.5; // Cambia esto a la puntuación que desees
            pintarEstrellas(puntuacionActual);
        </script>
    @endsection
