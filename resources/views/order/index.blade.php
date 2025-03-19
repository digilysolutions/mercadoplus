@extends('layouts.app-admin')

@section('title-header-admin')
    Orders
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Orders') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('orders.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

									<th >Temporary Id</th>
									<th >Person Id</th>
									<th >Purchase Person Id</th>
									<th >Delivery Person Id</th>
									<th >Status Id</th>
									<th >Subtotal Amount</th>
									<th >Total Amount</th>
									<th >Currency</th>
									<th >Exchange Rate</th>
									<th >Address</th>
									<th >Home Delivery</th>
									<th >Delivery Fee</th>
									<th >Purchase Date</th>
									<th >Delivery Date</th>
									<th >Delivery Time</th>
									<th >Time Unit</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $order->temporary_id }}</td>
										<td >{{ $order->person_id }}</td>
										<td >{{ $order->purchase_person_id }}</td>
										<td >{{ $order->delivery_person_id }}</td>
										<td >{{ $order->status_id }}</td>
										<td >{{ $order->subtotal_amount }}</td>
										<td >{{ $order->total_amount }}</td>
										<td >{{ $order->currency }}</td>
										<td >{{ $order->exchange_rate }}</td>
										<td >{{ $order->address }}</td>
										<td >{{ $order->home_delivery }}</td>
										<td >{{ $order->delivery_fee }}</td>
										<td >{{ $order->purchase_date }}</td>
										<td >{{ $order->delivery_date }}</td>
										<td >{{ $order->delivery_time }}</td>
										<td >{{ $order->time_unit }}</td>

                                            <td>
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('orders.show', $order->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('orders.edit', $order->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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

									<th >Temporary Id</th>
									<th >Person Id</th>
									<th >Purchase Person Id</th>
									<th >Delivery Person Id</th>
									<th >Status Id</th>
									<th >Subtotal Amount</th>
									<th >Total Amount</th>
									<th >Currency</th>
									<th >Exchange Rate</th>
									<th >Address</th>
									<th >Home Delivery</th>
									<th >Delivery Fee</th>
									<th >Purchase Date</th>
									<th >Delivery Date</th>
									<th >Delivery Time</th>
									<th >Time Unit</th>

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
