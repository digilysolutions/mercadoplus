@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $person->name ?? __('Show') . " " . __('Person') }}
@endsection

@section('content-admin')
    <section class="content container-fluid">

    </section>
@endsection
