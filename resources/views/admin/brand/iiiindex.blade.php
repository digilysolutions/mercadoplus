@extends('layouts.app-admin')
@section('title-header-admin')
    Marcas
@endsection

@section('content-admin')
<div class="container-fluid add-form-list">
    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex flex-wrap align-items-center  mb-4">
                <div>
                    <h4 class="mb-3">Marcas del producto</h4>
                    <p class="mb-0">Las marcas de producto de tu tienda se pueden gestionar desde estasección.</p>
                </div>

            </div>

        </div>
        <div class="col-lg-4"> <button class="btn btn-secondary" data-toggle="modal" data-target="#new-brand"> Nueva
                Marca</button></div>
        <div class="col-xl-12 col-lg-12">
</div>
@endsection