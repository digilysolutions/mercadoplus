<div class="modal fade" id="new-category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="El nombre de la categoría obligatorio" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea id="description" name="description" class="form-control"></textarea>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Seleccione una moneda:<span style="color: #FF9770 !important;">*</span></label>
                                        <select id="baseCurrency" name="code_currency_default" class="form-control">
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency['currency']['code'] }}">
                                                    {{ $currency['currency']['code'] }}</option>
                                            @endforeach

                                        </select>

                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="exchangeRatesContainer" style="display: none;">
                                    <label>Tasas de cambio</label>
                                    <div  id="exchangeRates"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="crm-profile-img-edit position-relative">
                                            <img class="crm-profile-pic rounded avatar-100"
                                                src="{{ asset('admin/images/upload/no-picture.jpg') }}"
                                                alt="profile-pic" id="image-preview">
                                            <div class="crm-p-image bg-primary">
                                                <i class="las la-pen upload-button"></i>
                                                <input id="path_image" name="path_image" class="file-upload"
                                                    type="file" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="img-extension mt-3">
                                            <div class="d-inline-block align-items-center">
                                                <span>Solo</span>
                                                <span class="text-secondary">.jpg /</span>
                                                <span class="text-secondary">.png /</span>
                                                <span class="text-secondary">.jpeg /</span>
                                                <span class="text-secondary">.webp /</span>
                                                <span>Permitido</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div class="checkbox">
                                        <label><input id="is_activated" name="is_activated" class="mr-2"
                                                type="checkbox" checked>Activado</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="currencyArray" name="currencyArray" value="">
                            <button type="submit" class="btn btn-primary mr-2">Añadir</button>
                            <button type="reset" class="btn btn-secondary">Limpiar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
