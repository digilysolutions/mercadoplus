<div class="modal fade" id="locationEditModal{{ $location['id'] }}" tabindex="-100" role="dialog"
    aria-labelledby="editLocationLabel" aria-hidden="false">
    <div class="modal-dialog model-g" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="locationEditModal">Editar
                    Zona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('location.update', ['id' => $location['id']]) }}"
                                id="editLocationForm" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: #676e8a;"><b>País: Cuba</b></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: #676e8a;"><b> Municipio: Isla de la Juventud</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zona</label>
                                            <input type="text" id="name" name="name" class="form-control"  value="{{ $location['name'] }}">
                                           
                                            <div class="help-block with-errors">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Código Postal</label>
                                            <input type="text" id="zip_code" name="zip_code"
                                                value="{{ $location['zip_code'] }}" class="form-control">
                                            <div class="help-block with-errors">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input type="text" id="address" name="address" class="form-control"   value="{{ $location['address'] }}">
                                          
                                            <div class="help-block with-errors">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Punto de referencia</label>
                                            <input type="text" id="landmark" name="landmark" class="form-control" value="{{ $location['landmark'] }}">
                                            <div class="help-block with-errors">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea class="form-control" id="description" name="description" 
                                                rows="4">{{ $location['description'] }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                <input id="is_activated" name="is_activated" class="mr-2"
                                                    type="checkbox" @if ($location['is_activated'] == 1) checked @endif>
                                                Activado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
