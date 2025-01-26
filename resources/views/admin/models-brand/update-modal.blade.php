<div class="modal fade" id="modelEditModal{{ $model['id'] }}"
tabindex="-100" role="dialog" aria-labelledby="editCategoryModalLabel"
aria-hidden="false">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modelEditModal">Editar
               Modelo</h5>
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
                            action="{{ route('model.update', ['id' => $model['id']]) }}"
                            id="editbrandBaseForm"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre <span style="color: #FF9770 !important;">*</span></label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="El nombre de la marca" required    value="{{ $model['name'] }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Marca</label>
                                        <select id="brand_id" name="brand_id" class="form-control">

                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand['id'] }}"  {{ $brand['id'] == $model['brand_id'] ? 'selected' : '' }}>
                                                    {{ $brand['name'] }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        @php
                                            // Define el año de inicio
                                            $startYear = 1995;
                                            // Obtiene el año actual
                                            $currentYear = date('Y');
                                        @endphp

                                        <label>Año</label>
                                        <select id="year" name="year" class="form-control">
                                            @for ($year = $startYear; $year <= $currentYear; $year++)
                                                <option value="{{ $year }}" {{ $year == $model['year'] ? 'selected' : '' }}>{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea id="description" name="description" class="form-control">{{ $model['description'] }}</textarea>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Características</label>
                                        <textarea id="characteristics" name="characteristics" class="form-control"></textarea>

                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="checkbox">
                                        <label>
                                            <input id="is_activated"
                                                name="is_activated"
                                                class="mr-2"
                                                type="checkbox"
                                                @if ($model['is_activated'] == 1) checked @endif>
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