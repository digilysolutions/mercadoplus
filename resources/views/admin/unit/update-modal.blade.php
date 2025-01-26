<div class="modal fade" id="unitEditModal{{ $unit['id'] }}"
tabindex="-100" role="dialog" aria-labelledby="editUnitModalLabel"
aria-hidden="false">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="unitModal">Editar
                Unidad</h5>
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
                            action="{{ route('units.update', ['id' => $unit['id']]) }}"
                            id="editUnitForm"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre <span
                                                style="color: #FF9770 !important;">*</span></label>
                                        <input id="name"
                                            name="name" type="text"
                                            class="form-control"
                                            placeholder="El nombre de la unidad"
                                            value="{{ $unit['name'] }}"
                                            required>
                                        <div
                                            class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre Corto <span
                                                style="color: #FF9770 !important;">*</span></label>
                                        <input id="shortname"
                                            name="shortname" type="text"
                                            class="form-control"
                                            placeholder="El nombre corto"
                                            value="{{ $unit['shortname'] }}"
                                            required>
                                        <div
                                            class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Unidad Base <span
                                                style="color: #FF9770 !important;">*</span></label>
                                                <select id="unit_id"
                                                name="unit_id" class="form-control">
                                                @foreach ($units_base as $unitbase)
                                                <option value="{{ $unitbase['id'] }}"     {{ $unitbase['id'] == $unit['unitbase_id'] ? 'selected' : '' }}>{{ $unitbase['name'] }}</option>
                                            @endforeach
                                                   
                                                </select>
                                        
                                        <div
                                            class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>                               
                                
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input id="is_activated"
                                                name="is_activated"
                                                class="mr-2"
                                                type="checkbox"
                                                @if ($unit['is_activated'] == 1) checked @endif>
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