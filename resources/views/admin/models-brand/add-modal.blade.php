<div class="modal fade" id="new-model" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Añadir nuevo modelo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('model.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre <span style="color: #FF9770 !important;">*</span></label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="El nombre de la marca" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Marca</label>
                                        <select id="brand_id" name="brand_id" class="form-control">

                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand['id'] }}">
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
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea id="description" name="description" class="form-control"></textarea>

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
