<div class="modal fade" id="new-deliveryZones" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Añadir nuevo domicilio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('deliveryZone.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zona<span style="color: #FF9770 !important;">*</span></label>
                                        <select id="location_id" name="location_id" class="form-control">
                                            @foreach ($locations as $location)
                                                <option value="{{ $location['id'] }}">
                                                    {{ $location['name'] }} </option>
                                            @endforeach

                                        </select>

                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Precio</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" class="form-control" name="price" id="price"                                          >
                                       
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>Tiempo de entrega</label>
                                    <div class="input-group mb-4">                                        
                                        <input type="number" class="form-control delivery_time" name="delivery_time" id="delivery_time" min="0">                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Unidad de tiempo</label>
                                    <div class="input-group mb-4">
                                        <select class="form-control time_unit"  id="time_unit" class="form-control" name="time_unit">
                                            <option value="">-- Seleccione --</option>
                                        </select>                                      
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label><input id="is_activated" name="is_activated" class="mr-2"
                                                type="checkbox" checked>Activado</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Añadir</button>
                            <button type="reset" class="btn btn-secondary">Limpiar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
