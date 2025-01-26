<div class="modal fade" id="deleteModal_{{ $person['id'] }}" tabindex="-1" role="dialog"
            aria-labelledby="editPersonModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePersonModalLabel">Eliminar Persona</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-id="{{ $person['id'] }}" class="btn btn-secondary yes-delete-person">Si</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    </div>

                </div>
            </div>
        </div>