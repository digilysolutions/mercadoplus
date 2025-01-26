<div class="modal fade" id="modelShowModal{{ $model['id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="modelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelcategoryModalLabel">Detalles del modelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">

                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="mb-1" id="name_model">
                                        <label>Modelo:</label> {{ $model['name'] }}
                                    </h4>
                                    <p>
                                        <label>Marca:</label> {{ $model['brand']['name'] }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-1">
                                        <label>año:</label>
                                        @if ($model['year'])
                                            {{ $model['year'] }}
                                        @else
                                            ----
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <label>Características:</label>
                                    <p> {{ $model['characteristics'] }}</p>
                                </div>
                                <div class="col-md-12">
                                    <label>Descripción:</label>
                                    <p> {{ $model['description'] }}</p>
                                </div>
                                <div class="col-md-12">
                                    <p class="mb-1">Activado:
                                        @if ($model['is_activated'])
                                            Si
                                        @else
                                            No
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
