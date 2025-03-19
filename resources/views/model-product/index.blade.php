@extends('layouts.app-admin')

@section('title-header-admin')
    {{__('Models')}}
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Models') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('model-products.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

									<th >{{__('Name')}}</th>
									<th >{{__('Description')}}</th>
									<th >{{__('Year')}}</th>
									<th >{{__('Characteristics')}}</th>
									<th >{{__('Brand')}}</th>
									<th >{{__('is_activated')}}</th>

                                        <th style="width: 100px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($modelProducts as $modelProduct)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $modelProduct->name }}</td>
										<td >{{ $modelProduct->description }}</td>
										<td >{{ $modelProduct->year }}</td>
										<td >{{ $modelProduct->characteristics }}</td>
										<td >{{ $modelProduct->brand?->name }}</td>
										<td >  @if ($modelProduct->is_activated == 1)
                                            Si
                                        @else
                                            No
                                        @endif</td>

                                            <td>
                                                <form action="{{ route('model-products.destroy', $modelProduct->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('model-products.show', $modelProduct->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('model-products.edit', $modelProduct->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                  <tfoot>
                                 <tr>
                                 <th>No</th>

                                 <th >{{__('Name')}}</th>
                                 <th >{{__('Description')}}</th>
                                 <th >{{__('Year')}}</th>
                                 <th >{{__('Characteristics')}}</th>
                                 <th >{{__('Brand')}}</th>
                                 <th >{{__('is_activated')}}</th>

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
