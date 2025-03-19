@extends('layouts.app-admin')

@section('title-header-admin')
{{ __('People') }}
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('People') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('people.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

									<th >{{__('First Name')}}
									<th >{{__('Last Name')}}</th>
									<th >{{__('validation.attributes.mobile')}}</th>
									<th >{{__('Status')}}</th>
									<th >{{__('Type')}}</th>
									<th >{{__('Location')}}</th>
									<th >{{__('is_activated')}}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($people as $person)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $person->first_name }}</td>
                                            <td>{{ $person->last_name }}</td>
                                            <td>{{ $person->contact->mobile }}</td>
                                            <td>{{ isset($person->personStatus) ? $person->personStatus->name : '' }}
                                            </td>
                                            <td><label class="mt-2 badge border border-warning text-warning mt-2">
                                                {{ $person->getPersonType() }}</label></td>
                                            <td>{{ isset($person->contact->location) ? $person->contact->location->name : '' }}
                                            </td>
                                            <td>
                                                @if ($person->is_activated == 1)
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('people.destroy', $person->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#personShowModal{{ $person['id'] }}"
                                                    data-id="{{ $person['id'] }}"
                                                    href="#"><i class="ri-eye-line"
                                                        ></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('people.edit', $person->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-warning btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                         <!-- Modal Show Persona -->
                                         @include('person.show-modal')
                                    @endforeach
                                </tbody>
                                  <tfoot>
                                 <tr>
                                 <th>No</th>
                                 <th >{{__('First Name')}}<th >Middle Name</th>
                                 <th >{{__('Last Name')}}</th>
                                 <th >{{__('validation.attributes.mobile')}}</th>
                                 <th >{{__('Status')}}</th>
                                 <th >{{__('Type')}}</th>
                                 <th >{{__('Location')}}</th>
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
<script src="{{ asset('includes/admin/person-admin.js') }}"></script>
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
@endsection
