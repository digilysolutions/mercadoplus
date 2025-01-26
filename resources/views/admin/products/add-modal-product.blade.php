<div class="modal fade" id="new-category-product" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Añadir nueva categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre <span style="color: #FF9770 !important;">*</span></label>
                                        <input id="nameCategory" name="name" type="text" class="form-control"
                                            placeholder="El nombre de la categoría obligatorio" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Añadir</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
