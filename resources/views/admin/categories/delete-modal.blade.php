<div class="modal fade" id="deleteModal_{{ $category['id'] }}"  tabindex="-1" role="dialog"
            aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCategoryModalLabel">Eliminar Categoría</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-id="{{ $category['id'] }}"  id="deleteCategory" class="btn btn-secondary yes-delete-category">Si</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    </div>

                </div>
            </div>
        </div>