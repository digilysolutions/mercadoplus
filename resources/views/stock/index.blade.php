@extends('layouts.app-admin')

@section('title-header-admin')
    Stocks
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Stocks') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('stocks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

									<th >Warehouse Id</th>
									<th >Quantity Available</th>
									<th >Minimum Quantity</th>
									<th >Maximum Quantity</th>
									<th >Product Id</th>
									<th >Taxs Rates Id</th>
									<th >Is Activated</th>
									<th >Enable Discounts By Quantities</th>
									<th >Enable Discounts By Weights</th>
									<th >Enable Discounts By Expiration Dates</th>
									<th >Enable Discounts By Discounts By Important Dates</th>
									<th >Discounts By Quantities Id</th>
									<th >Discounts By Weights Id</th>
									<th >Discounts By Expiration Dates Id</th>
									<th >Discounts By Discounts By Important Dates Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($stocks as $stock)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $stock->warehouse_id }}</td>
										<td >{{ $stock->quantity_available }}</td>
										<td >{{ $stock->minimum_quantity }}</td>
										<td >{{ $stock->maximum_quantity }}</td>
										<td >{{ $stock->product_id }}</td>
										<td >{{ $stock->taxs_rates_id }}</td>
										<td >{{ $stock->is_activated }}</td>
										<td >{{ $stock->enable_discounts_by_quantities }}</td>
										<td >{{ $stock->enable_discounts_by_weights }}</td>
										<td >{{ $stock->enable_discounts_by_expiration_dates }}</td>
										<td >{{ $stock->enable_discounts_by_discounts_by_important_dates }}</td>
										<td >{{ $stock->discounts_by_quantities_id }}</td>
										<td >{{ $stock->discounts_by_weights_id }}</td>
										<td >{{ $stock->discounts_by_expiration_dates_id }}</td>
										<td >{{ $stock->discounts_by_discounts_by_important_dates_id }}</td>

                                            <td>
                                                <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('stocks.show', $stock->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('stocks.edit', $stock->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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

									<th >Warehouse Id</th>
									<th >Quantity Available</th>
									<th >Minimum Quantity</th>
									<th >Maximum Quantity</th>
									<th >Product Id</th>
									<th >Taxs Rates Id</th>
									<th >Is Activated</th>
									<th >Enable Discounts By Quantities</th>
									<th >Enable Discounts By Weights</th>
									<th >Enable Discounts By Expiration Dates</th>
									<th >Enable Discounts By Discounts By Important Dates</th>
									<th >Discounts By Quantities Id</th>
									<th >Discounts By Weights Id</th>
									<th >Discounts By Expiration Dates Id</th>
									<th >Discounts By Discounts By Important Dates Id</th>

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
