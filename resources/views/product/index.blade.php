@extends('layouts.app-admin')

@section('title-header-admin')
    Productos
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Products') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

									<th >Producto</th>
									<th >Categoría</th>
									<th >Costo</th>
									<th >Precio</th>
									<th >Marca</th>
									<th >Creado</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php
                                     $i=0;
                                 @endphp

                                    @foreach ($products as $product)
                                        <tr><tr class="odd">
                                            <td class="sorting_1">
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox2">
                                                    <label for="checkbox2" class="mb-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $product['outstanding_image'] }}" class="img-fluid rounded avatar-50 mr-3"
                                                        alt="image">
                                                    <div>
                                                        {{ $product['name'] }}
                                                        <p class="mb-0"><small>
                                                                @if ($product['sku'])
                                                                    SKU:{{ $product['sku'] }}
                                                                @endif
                                                            </small></p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                @foreach ($product->categories as $category)
                                                    <span class="mt-2 badge badge-primary">{{ $category->name}} </span>
                                                @endforeach

                                            </td>
                                            <td>${{ $product['purchase_price'] ?? 0 }}</td>
                                            <td>${{ $product['sale_price'] ?? 0 }}</td>
                                            <td>
                                                @if ($product['brand'] !== null && $product['brand']['name'] !== null)
                                                    {{ $product['brand']['name'] }}
                                                @endif
                                            </td>

                                            <td>{{ $product['created_at'] }}</td>
                                            <td>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                    <a class="badge badge-info mr-2 " data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="{{ __('Show') }}" href="{{ route('products.show', $product->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="{{ __('Edit') }}" href="{{ route('products.edit', $product->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a type="submit" class="badge bg-warning mr-2 " data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="{{ __('Delete') }}"  onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> </a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                  <tfoot>
                                 <tr>
                                 <th>No</th>

                                 <th >Producto</th>
                                 <th >Categoría</th>
                                 <th >Costo</th>
                                 <th >Precio</th>
                                 <th >Marca</th>
                                 <th >Creado</th>

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
