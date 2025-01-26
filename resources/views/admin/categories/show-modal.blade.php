<div class="modal fade" id="categoryShowModal{{ $category['id'] }}"
tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="categoryModalLabel">Detalles de la
                Categoría: {{ $category['name'] }}</h5>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card card-block card-stretch card-height">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="profile-img position-relative">
                            <img src="{{ $category['path_image'] }}"
                                class="img-fluid rounded avatar-110"
                                alt="profile-image">
                        </div>
                        <div class="ml-3">
                            <h4 class="mb-1" id="name_category">
                                {{ $category['name'] }}</h4>
                            <p class="mb-2">
                                @if ($category['short_code'])
                                    slg: {{ $category['short_code'] }}
                                @endif
                            </p>
                            
                            <p class="mb-1">Cantidad Productos:
                                {{ count($category['products']) }}
                            </p>
                            <p class="mb-1">Activado:
                               @if($category['is_activated']) Si @else No @endif 
                            </p>
                        </div>
                    </div>
                    <p>
                        <label>Moneda:</label>
                        {{ $category['code_currency_default'] }}
                    </p>
                    <p>
                        {{ $category['description'] }}
                    </p>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>