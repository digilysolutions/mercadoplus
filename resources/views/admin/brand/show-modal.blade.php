<div class="modal fade" id="brandShowModal{{ $brand['id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="brandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Detalles de a Marca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">

                            <div class="ml-3">
                                <h4 class="mb-1" id="name_category">
                                    {{ $brand['name'] }}</h4>
                                <p>
                                    {{ $brand['description'] }}
                                </p>
                                <p>Cantidad de productos: 
                                    {{ count($brand['products'])  }}
                                </p>
                                <p class="mb-1">Activado:
                                    @if ($brand['is_activated'])
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
