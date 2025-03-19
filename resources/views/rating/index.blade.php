@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Rating') }}
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ratings') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('ratings.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-tables table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No</th>
                                        <th>Autor</th>
                                        <th>{{ __('Rating') }}</th>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('is_activated') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp

                                    @foreach ($ratings as $rating)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $rating->person->first_name }} {{ $rating->person->last_name }}</td>
                                            <td> <div class="estrellas align-items-center justify-content-center "
                                                id="estrellas">
                                                @for ($index = 0; $index < $rating->rating; $index++)
                                                    <span class="estrella" data-valor="{{ $index }}">☆</span>
                                                @endfor
                                                <span style=" font-size: 20px;">({{ $rating->rating }})</span>

                                            </div></td>

                                            <td>{{ $rating->product->name }}</td>
                                            <td>{{ $rating->date }}</td>
                                            <td>
                                                @if ($rating->is_activated == 1)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Autor</th>
                                        <th>{{ __('Rating') }}</th>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('is_activated') }}</th>

                                        <th></th>
                                    </tr>
                                </tfoot>
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
    <script src="{{ asset('js/bootstrap-table.js') }}"></script>
@endsection
