@extends('layouts.app-admin')

@section('title-header-admin')
    Order Products
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Order Products') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('order-products.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

									<th >Order Id</th>
									<th >Person Id</th>
									<th >Price</th>
									<th >Quantity</th>
									<th >Total Price</th>
									<th >Subtotal Price</th>
									<th >Price Discount</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($orderProducts as $orderProduct)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $orderProduct->order_id }}</td>
										<td >{{ $orderProduct->person_id }}</td>
										<td >{{ $orderProduct->price }}</td>
										<td >{{ $orderProduct->quantity }}</td>
										<td >{{ $orderProduct->total_price }}</td>
										<td >{{ $orderProduct->subtotal_price }}</td>
										<td >{{ $orderProduct->price_discount }}</td>

                                            <td>
                                                <form action="{{ route('order-products.destroy', $orderProduct->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('order-products.show', $orderProduct->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('order-products.edit', $orderProduct->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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

									<th >Order Id</th>
									<th >Person Id</th>
									<th >Price</th>
									<th >Quantity</th>
									<th >Total Price</th>
									<th >Subtotal Price</th>
									<th >Price Discount</th>

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
