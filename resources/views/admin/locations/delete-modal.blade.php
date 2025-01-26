<div class="modal fade" id="deleteModal_{{ $location['id'] }}" tabindex="-1" role="dialog"
            aria-labelledby="editlocationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteLocationLabel">Eliminar Zona</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-id="{{ $location['id'] }}" class="btn btn-secondary yes-delete-location">Si</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    </div>

                </div>
            </div>
        </div>