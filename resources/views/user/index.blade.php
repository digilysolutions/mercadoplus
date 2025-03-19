@extends('layouts.app-admin')

@section('title-header-admin')
    usuario General
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Usuario General') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if (isset($error))
                        <div class="alert alert-danger">
                            {!! $error !!}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-tables table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No</th>
                                        <th>Código</th>
                                        <th>Nombre y Apellidos</th>
                                        <th>Curso</th>
                                        <th>Usuario</th>
                                        <th>Membresía</th>
                                        <th>Activado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $user->id }}</td>
                                            <td>@if($user->person){{ $user->person->name }} {{ $user->person->lastname }} @else ------ @endif</td>
                                            <td>
                                                @if($user->person && $user->person->student && $user->person->student->course)
                                                    {{ $user->person->student->course }} @else ------
                                                @endif
                                            </td>

                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @if($user->person && $user->person->student && $user->person->student->membership)
                                                    {{ $user->person->student->membership->name }} @else ------
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->activated == 1)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('users.show', $user->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit', $user->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-warning btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Código</th>
                                        <th>Nombre y Apellidos</th>
                                        <th>Curso</th>
                                        <th>Usuario</th>
                                        <th>Membresía</th>
                                        <th>Activado</th>
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
    <script src="{{ asset('js/bootstrap-table.js') }}"></script>
@endsection
