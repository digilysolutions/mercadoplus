<div class="modal fade" id="currencyEditModal{{ $currency['id'] }}"
tabindex="-100" role="dialog" aria-labelledby="editCategoryModalLabel"
aria-hidden="false">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="unitbaseEditModal">Editar
                Moneda</h5>
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
                            action="{{ route('currency.update', ['id' => $currency['id']]) }}"
                            id="editUnitBaseForm"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Moneda <span
                                                style="color: #FF9770 !important;">*</span></label>
                                        <input id="currency"
                                            name="currency" type="text"
                                            class="form-control"
                                            placeholder="El nombre de la moneda"
                                            value="{{ $currency['currency'] }}"
                                            required>
                                        <div
                                            class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>País <span
                                                style="color: #FF9770 !important;">*</span></label>
                                        <input id="country"
                                            name="country" type="text"
                                            class="form-control"
                                            placeholder="País"
                                            value="{{ $currency['country'] }}"
                                            >
                                        <div
                                            class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Código <span
                                                style="color: #FF9770 !important;">*</span></label>
                                        <input id="code"
                                            name="code" type="text"
                                            class="form-control"
                                            placeholder="code"
                                            value="{{ $currency['code'] }}"
                                            >
                                        <div
                                            class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Símbolo <span
                                                style="color: #FF9770 !important;">*</span></label>
                                        <input id="symbol"
                                            name="symbol" type="text"
                                            class="form-control"
                                            placeholder="code"
                                            value="{{ $currency['symbol'] }}"
                                            >
                                        <div
                                            class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Separador de miles <span
                                                style="color: #FF9770 !important;">*</span></label>
                                        <input id="thousand_separator"
                                            name="thousand_separator" type="text"
                                            class="form-control"
                                            placeholder="code"
                                            value="{{ $currency['thousand_separator'] }}"
                                            >
                                        <div
                                            class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Separador decimal <span
                                                style="color: #FF9770 !important;">*</span></label>
                                        <input id="decimal_separator"
                                            name="decimal_separator" type="text"
                                            class="form-control"
                                            placeholder="code"
                                            value="{{ $currency['decimal_separator'] }}"
                                            >
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
                                                @if ($currency['is_activated'] == 1) checked @endif>
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