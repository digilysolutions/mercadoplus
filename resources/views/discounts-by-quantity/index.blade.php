@extends('layouts.app-admin')

@section('title-header-admin')
    Discounts By Quantities
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Discounts By Quantities') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('discounts-by-quantities.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >Quantity</th>
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

                                    @foreach ($discountsByQuantities as $discountsByQuantity)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $discountsByQuantity->name }}</td>
										<td >{{ $discountsByQuantity->is_activated }}</td>
										<td >{{ $discountsByQuantity->discount_type }}</td>
										<td >{{ $discountsByQuantity->quantity }}</td>
										<td >{{ $discountsByQuantity->discount_amount }}</td>
										<td >{{ $discountsByQuantity->start_date }}</td>
										<td >{{ $discountsByQuantity->end_date }}</td>

                                            <td>
                                                <form action="{{ route('discounts-by-quantities.destroy', $discountsByQuantity->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('discounts-by-quantities.show', $discountsByQuantity->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('discounts-by-quantities.edit', $discountsByQuantity->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
									<th >Quantity</th>
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
