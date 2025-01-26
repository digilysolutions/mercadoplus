<div class="modal fade" id="categoryEditModal{{ $category['id'] }}" tabindex="-100" role="dialog"
    aria-labelledby="editCategoryModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Editar
                    Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('category.update', ['id' => $category['id']]) }}"
                                id="editCategoryForm" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nombre <span style="color: #FF9770 !important;">*</span></label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                placeholder="El nombre de la categoría" value="{{ $category['name'] }}"
                                                required>
                                            <div class="help-block with-errors">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea id="description" name="description" class="form-control">{{ $category['description'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Monedas<span style="color: #FF9770 !important;">*</span></label>
                                            <select id="unit_id" name="unit_id" class="form-control">
                                                @foreach ($currencies as $currency)
                                                    <option value="{{ $currency['code'] }}"
                                                        {{ $currency['code'] == $category['code_currency_default'] ? 'selected' : '' }}>
                                                        {{ $currency['code'] }}</option>
                                                @endforeach

                                            </select>

                                            <div class="help-block with-errors">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="crm-profile-img-edit position-relative">
                                                <img class="crm-profile-pic rounded avatar-100"
                                                    src="{{ $category['path_image'] }}" alt="profile-pic"
                                                    id="image-preview{{ $category['id'] }}">
                                                <div class="">

                                                    <input id="path_image" name="path_image"
                                                        onchange="load_change_image(event,'image-preview{{ $category['id'] }}')"
                                                        type="file" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="img-extension mt-3">
                                                <div class="d-inline-block align-items-center">
                                                    <span>Solo</span>
                                                    <span class="text-secondary">.jpg
                                                        /</span>
                                                    <span class="text-secondary">.png
                                                        /</span>
                                                    <span class="text-secondary">.jpeg
                                                        /</span>
                                                    <span class="text-secondary">.webp
                                                        /</span>
                                                    <span>Permitido</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                <input id="is_activated" name="is_activated" class="mr-2"
                                                    type="checkbox" @if ($category['is_activated'] == 1) checked @endif>
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
