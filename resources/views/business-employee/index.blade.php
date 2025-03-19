@extends('layouts.app-admin')

@section('title-header-admin')
    Business Employees
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Business Employees') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('business-employees.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

									<th >Is Activated</th>
									<th >Employee Id</th>
									<th >Business Id</th>
									<th >Hiredate</th>
									<th >Email Business</th>
									<th >Person Statuses Id</th>
									<th >Person Statuses Message</th>
									<th >Jobtitle</th>
									<th >Department</th>
									<th >Role</th>
									<th >Salary</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($businessEmployees as $businessEmployee)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $businessEmployee->is_activated }}</td>
										<td >{{ $businessEmployee->employee_id }}</td>
										<td >{{ $businessEmployee->business_id }}</td>
										<td >{{ $businessEmployee->hireDate }}</td>
										<td >{{ $businessEmployee->email_business }}</td>
										<td >{{ $businessEmployee->person_statuses_id }}</td>
										<td >{{ $businessEmployee->person_statuses_message }}</td>
										<td >{{ $businessEmployee->jobTitle }}</td>
										<td >{{ $businessEmployee->department }}</td>
										<td >{{ $businessEmployee->role }}</td>
										<td >{{ $businessEmployee->salary }}</td>

                                            <td>
                                                <form action="{{ route('business-employees.destroy', $businessEmployee->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('business-employees.show', $businessEmployee->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('business-employees.edit', $businessEmployee->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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

									<th >Is Activated</th>
									<th >Employee Id</th>
									<th >Business Id</th>
									<th >Hiredate</th>
									<th >Email Business</th>
									<th >Person Statuses Id</th>
									<th >Person Statuses Message</th>
									<th >Jobtitle</th>
									<th >Department</th>
									<th >Role</th>
									<th >Salary</th>

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
