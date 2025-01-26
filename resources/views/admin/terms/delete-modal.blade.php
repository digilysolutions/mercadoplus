<div class="modal fade" id="deleteModal_{{ $term['id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="editTermModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTermModalLabel">Eliminar Término</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" data-id="{{ $term['id'] }}"
                    class="btn btn-secondary yes-delete-term">Si</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="deleteModalAttributeTerms_{{ $term['id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="editTermModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTermModalLabel">Eliminar Término</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" data-id="{{ $term['id'] }}" id="attributeTermId_{{$term['attribute']['id']  }}"
                    class="btn btn-secondary yes-delete-attribute-term">Si</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
            </div>

        </div>
    </div>
</div>
