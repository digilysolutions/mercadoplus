<div class="modal fade" id="deleteModal_{{ $unit['id'] }}" tabindex="-1" role="dialog"
            aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteUnitModalLabel">Eliminar Unidad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button"  data-id="{{ $unit['id'] }}" class="btn btn-secondary yes-delete-units">Si</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    </div>

                </div>
            </div>
        </div>