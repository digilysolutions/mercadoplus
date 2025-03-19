@extends('layouts.app-admin')

@section('title-header-admin')
    Customers
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Customers') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

									<th >Person Id</th>
									<th >Person Statuses Message</th>
									<th >Billingaddress Id</th>
									<th >Shippingaddress Id</th>
									<th >Creditcardnumber</th>
									<th >Creditcardexpirationdate</th>
									<th >Creditlimit</th>
									<th >Is Activated</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $customer->person_id }}</td>
										<td >{{ $customer->person_statuses_message }}</td>
										<td >{{ $customer->billingAddress_id }}</td>
										<td >{{ $customer->shippingAddress_id }}</td>
										<td >{{ $customer->creditCardNumber }}</td>
										<td >{{ $customer->creditCardExpirationDate }}</td>
										<td >{{ $customer->creditLimit }}</td>
										<td >{{ $customer->is_activated }}</td>

                                            <td>
                                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('customers.show', $customer->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('customers.edit', $customer->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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

									<th >Person Id</th>
									<th >Person Statuses Message</th>
									<th >Billingaddress Id</th>
									<th >Shippingaddress Id</th>
									<th >Creditcardnumber</th>
									<th >Creditcardexpirationdate</th>
									<th >Creditlimit</th>
									<th >Is Activated</th>

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
