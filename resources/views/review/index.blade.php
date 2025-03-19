@extends('layouts.app-admin')

@section('title-header-admin')
    Reviews
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reviews') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('reviews.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>{{ __('Writer') }} </th>
                                        <th>{{ __('Comment') }} </th>
                                        <th>{{ __('Business') }}/{{ __('Product') }}</th>

                                        <th>{{ __('Date') }} </th>



                                        <th ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp

                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $review->person->first_name }} {{ $review->person->last_name }}</td>
                                            <td>{{ $review->comment }}</td>
                                            <td>
                                                @if ($review->product_id == null)
                                                    <label class="mt-2 badge border border-primary text-primary mt-2">
                                                        Negocio</label>
                                                @else
                                                    <label class="mt-2 badge border border-secondary text-secondary mt-2">
                                                        Producto</label>
                                                @endif
                                            </td>

                                            <td>{{ $review->date }}</td>
                                            <td>
                                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('reviews.show', $review->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('reviews.edit', $review->id) }}"><i
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
                                        <th>{{ __('Writer') }} </th>
                                        <th>{{ __('Comment') }} </th>
                                        <th>{{ __('Business') }}/{{ __('Product') }}</th>

                                        <th>{{ __('Date') }} </th>


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
