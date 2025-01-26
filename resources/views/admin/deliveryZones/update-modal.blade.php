<div class="modal fade" id="deliveryZoneEdit{{ $deliveryZone['id'] }}"
tabindex="-100" role="dialog" aria-labelledby="editattributeModalLabel"
aria-hidden="false">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="attributeEditModal">Editar
                Domicilio Base</h5>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('deliveryZone.update', ['id' => $deliveryZone['id']]) }}"
                            id="editattributeForm"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zona<span style="color: #FF9770 !important;">*</span></label>
                                        <select id="location_id" name="location_id" class="form-control">
                                            @foreach ($locations as $location)
                                                <option value="{{ $location['id'] }}" @if($location['id'] == $deliveryZone['location_id'])  selected @endif>
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
                                        <input type="number" class="form-control" name="price" id="price"  value="{{ $deliveryZone['price'] }}"                                         >
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Tiempo de entrega</label>
                                    <div class="input-group mb-4">                                        
                                        <input type="number" class="form-control delivery_time" name="delivery_time" id="delivery_time1" min="0" value="{{ $deliveryZone['delivery_time'] }}"  >                                       
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
                                        <label>
                                            <input id="is_activated"
                                                name="is_activated"
                                                class="mr-2"
                                                type="checkbox"
                                                @if ($deliveryZone['is_activated'] == 1) checked @endif>
                                            Activado
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"
                                    class="btn btn-secondary">Salvar</button>
                                <button type="button"
                                    class="btn btn-primary"
                                    data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>