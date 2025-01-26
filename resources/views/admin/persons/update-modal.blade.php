<div class="modal fade" id="tagEditModal{{ $tag['id'] }}"
tabindex="-100" role="dialog" aria-labelledby="editEtiquetaModalLabel"
aria-hidden="false">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="etiquetaEditModal">Editar etiqueta</h5>
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
                            action="{{ route('tag.update', ['id' => $tag['id']]) }}"
                            id="editTagForm"
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
                                            placeholder="El nombre de la etiqueta"
                                            value="{{ $tag['name'] }}"
                                            required>
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
                                                @if ($tag['is_activated'] == 1) checked @endif>
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