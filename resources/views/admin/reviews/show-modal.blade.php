<div class="modal fade" id="reviewShowModal{{ $review['id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Detalles de la
                    Reseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="row">

                                <div class="col-md-12">
                                    <p class="mb-1"><strong class="text-primary">Autor:</strong>
                                        {{ $review['writer']['first_name'] }} {{ $review['writer']['last_name'] }}
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <p class="mb-1">
                                        @if ($review['product_id'] == null)
                                            <label class="mt-2 badge border border-success text-success mt-2">
                                                Negocio / {{ $review['business']['name'] }}</label>
                                        @else
                                            <label class="mt-2 badge border border-danger text-danger mt-2">
                                                Producto / {{ $review['product']['name'] }}</label>
                                        @endif 

                                </div>
                                <div class="col-md-12">
                                    <strong class="text-primary"> Comentario:</strong>
                                    <p class="mb-1">
                                        {{ $review['comment'] }}
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <p class="mb-1"><strong class="text-primary">Fecha de envío:</strong>
                                        {{ $review['date'] }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong class="text-primary">Activado:</strong>
                                        @if ($review['is_activated'])
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
