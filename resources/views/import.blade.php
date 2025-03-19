@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Crear') }} Carga Inicial
@endsection
@section('content-admin')
    <h1>Carga Inicial de Datos</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Selecciona un archivo Excel:</label>
        <input type="file" name="import_file" required>
        <button type="submit" class="btn btn-primary btn-sm ">Cargar Datos</button>
    </form>
@endsection