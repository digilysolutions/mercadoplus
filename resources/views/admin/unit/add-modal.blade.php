<div class="modal fade" id="new-unit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Añadir nueva Unidad</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                   
                    <div class="card-body">
                        <form action="{{ route('units.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre <span style="color: #FF9770 !important;">*</span></label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="El nombre de la unidad" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre Corto <span style="color: #FF9770 !important;">*</span></label>
                                        <input id="shortname" name="shortname" type="text" class="form-control"
                                            placeholder="El nombre corto" required>
                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Unidad Base <span style="color: #FF9770 !important;">*</span></label>
                                        <select id="unit_id" name="unit_id" class="form-control">
                                            @foreach ($units_base as $unitbase)
                                                <option value="{{ $unitbase['id'] }}"                                                >
                                                    {{ $unitbase['name'] }}</option>
                                            @endforeach

                                        </select>

                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                                               checked>
                                            Activado
                                        </label>
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
