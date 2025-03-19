@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Currencies') }}
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Currencies') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('country-currencies.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>{{ __('Country') }}</th>
                                        <th>{{ __('Currency') }}</th>
                                        <th>{{ __('Codigo') }}</th>
                                        <th> {{ __('Exchange Rate') }}</th>
                                        <th>{{ __('is_activated') }}</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp

                                    @foreach ($countryCurrencies as $countryCurrency)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $countryCurrency->country->name }}</td>
                                            <td>{{ $countryCurrency->currency->currency }}</td>
                                            <td>

                                                <div
                                                class="badge
                                                 @if ($countryCurrency->code_currency_default)  badge-danger
                                                 @php $defualt_currency = 1; $name_defualt_currency = $countryCurrency->currency->code ; @endphp
                                                @else badge-light @endif ">
                                                {{$countryCurrency->currency->code }}</div>

                                            </td>
                                            <td>{{ $countryCurrency->exchange_rate }}</td>
                                            <td>@if ($countryCurrency->is_activated == 1)
                                                Si
                                            @else
                                                No
                                            @endif</td>

                                            <td>
                                                <form
                                                    action="{{ route('country-currencies.destroy', $countryCurrency->id) }}"
                                                    method="POST">

                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('country-currencies.edit', $countryCurrency->id) }}"><i
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
                                        <th>{{ __('Country') }}</th>
                                        <th>{{ __('Currency') }}</th>
                                        <th>{{ __('Codigo') }}</th>
                                        <th> {{ __('Exchange Rate') }}</th>
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
    <script src="{{ asset('js/bootstrap-table.js') }}"></script>
@endsection
