<div class="modal fade" id="locationsShowModal{{ $location['id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="unitBaseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Detalles de la
                    Zona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">

                            <div class="ml-3">
                                <h4 class="mb-1" id="name">
                                    {{ $location['name'] }}</h4>
                                <p>{{ $location['address'] }}</p>
                                <p>{{ $location['municipality_name'] }}</p>
                                <p>{{ $location['country_name'] }}</p>
                                <p><b class="text-warning">Código Postal: </b>{{ $location['zip_code'] }}</p>

                                <p><b class="text-warning">Punto de Referencia: </b>{{ $location['landmark'] }}</p>
                                <p class="mb-1"> <b class="text-warning">Activado:</b>
                                    @if ($location['is_activated'])
                                        Si
                                    @else
                                        No
                                    @endif
                                </p>
                                <p><b class="text-warning">Descripción: </b>{{ $location['description'] }}</p>
                               
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
