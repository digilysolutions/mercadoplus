<div class="modal fade" id="reviewEditModal{{ $review['id'] }}" tabindex="-100" role="dialog"
    aria-labelledby="editreviewModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewEditModal">Modificar
                    Reseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('review.update', ['id' => $review['id']]) }}"
                                id="editRevieForm" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Comentario <span style="color: #FF9770 !important;">*</span></label>

                                            <textarea id="comment" name="comment" class="form-control" required>{{ $review['comment'] }}</textarea>

                                            <div class="help-block with-errors">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                <input id="is_activated" name="is_activated" class="mr-2"
                                                    type="checkbox" @if ($review['is_activated'] == 1) checked @endif>
                                                Activado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary">Salvar</button>
                                    <button type="button" class="btn btn-primary"
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
