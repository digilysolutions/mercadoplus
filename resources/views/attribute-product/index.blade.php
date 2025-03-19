@extends('layouts.app-admin')

@section('title-header-admin')
    Attribute Products
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Attribute Products') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('attribute-products.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Product Id</th>
                                        <th>Attribute Id</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp

                                    @foreach ($attributeProducts as $attributeProduct)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td class="">
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input"
                                                        id="{{ $attribute['name'] }}">
                                                </div>
                                            </td>
                                            <td>{{ $attribute['name'] }}</td>
                                            <td>
                                                @if (count($attribute['terms']) == 0)
                                                    <a
                                                        href="{{ route('terms.attribute', ['id' => $attribute['id']]) }}">
                                                        Adicionar términos </a>
                                                @endif
                                                @for ($index = 0; $index < count($attribute['terms']); $index++)
                                                    {{ $attribute['terms'][$index]['name'] }}
                                                    @if (count($attribute['terms']) - 1 == $index)
                                                        </br>
                                                        <a
                                                            href="{{ route('terms.attribute', ['id' => $attribute['id']]) }}">
                                                            Configurar términos </a>
                                                    @else
                                                        ,
                                                    @endif
                                                @endfor


                                            </td>

                                            <td>
                                                <form
                                                    action="{{ route('attribute-products.destroy', $attributeProduct->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('attribute-products.show', $attributeProduct->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('attribute-products.edit', $attributeProduct->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-warning btn-sm"
                                                        onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>

                                        <th>Product Id</th>
                                        <th>Attribute Id</th>

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
