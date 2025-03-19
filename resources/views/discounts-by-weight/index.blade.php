@extends('layouts.app-admin')

@section('title-header-admin')
    Discounts By Weights
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Discounts By Weights') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('discounts-by-weights.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

									<th >Name</th>
									<th >Is Activated</th>
									<th >Discount Type</th>
									<th >Weight</th>
									<th >Unit Id</th>
									<th >Discount Amount</th>
									<th >Start Date</th>
									<th >End Date</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($discountsByWeights as $discountsByWeight)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $discountsByWeight->name }}</td>
										<td >{{ $discountsByWeight->is_activated }}</td>
										<td >{{ $discountsByWeight->discount_type }}</td>
										<td >{{ $discountsByWeight->weight }}</td>
										<td >{{ $discountsByWeight->unit_id }}</td>
										<td >{{ $discountsByWeight->discount_amount }}</td>
										<td >{{ $discountsByWeight->start_date }}</td>
										<td >{{ $discountsByWeight->end_date }}</td>

                                            <td>
                                                <form action="{{ route('discounts-by-weights.destroy', $discountsByWeight->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('discounts-by-weights.show', $discountsByWeight->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('discounts-by-weights.edit', $discountsByWeight->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-warning btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                  <tfoot>
                                 <tr>
                                 <th>No</th>

									<th >Name</th>
									<th >Is Activated</th>
									<th >Discount Type</th>
									<th >Weight</th>
									<th >Unit Id</th>
									<th >Discount Amount</th>
									<th >Start Date</th>
									<th >End Date</th>

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
