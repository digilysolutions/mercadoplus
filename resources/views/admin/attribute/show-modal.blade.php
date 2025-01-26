<div class="modal fade" id="attributeShowModal{{ $attribute['id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="attributeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attributeModalLabel">Detalles del atribute</h5>
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
                                    {{ $attribute['name'] }}</h4>

                                <p class="mb-1">Activado:
                                    @if ($attribute['is_activated'])
                                        Si
                                    @else
                                        No
                                    @endif
                                </p>
                                <h4 class="mb-1" id="name_category">
                                    Términos:</h4>



                                @for ($index = 0; $index < count($attribute['terms']); $index++)
                                    {{ $attribute['terms'][$index]['name'] }}
                                    @if (count($attribute['terms']) - 1 != $index)
                                        ,
                                    @endif
                                @endfor
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
