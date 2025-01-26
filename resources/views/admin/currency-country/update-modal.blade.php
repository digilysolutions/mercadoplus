<div class="modal fade" id="countrycurrencyEditModal{{ $countrycurrency['id'] }}" tabindex="-100" role="dialog"
    aria-labelledby="editCategoryModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unitbaseEditModal">Editar
                    Tasa cambiaria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('countrycurrency.update', ['id' => $countrycurrency['id']]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>País<span style="color: #FF9770 !important;">*</span></label>
                                        <select id="country_id" name="country_id" class="form-control">
                                            <option value=1 selected> Cuba </option>
                                        </select>

                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Moneda<span style="color: #FF9770 !important;">*</span></label>
                                        <select id="currency_id" name="currency_id" class="form-control">
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency['id'] }}"
                                                    {{ $currency['code'] == $countrycurrency['currency']['code'] ? 'selected' : '' }}>
                                                    {{ $currency['code'] }}
                                                    - {{ $currency['currency'] }}</option>
                                            @endforeach

                                        </select>

                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Tasa de Cambio @if ($countrycurrency['code_currency_default'])
                                            <b class="text-warning">(Moneda por defecto
                                                {{ $name_defualt_currency }})</b>
                                        @endif
                                    </label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" name="exchange_rate"
                                            id="exchange_rate" value="{{ $countrycurrency['exchange_rate'] }}">

                                    </div>
                                </div>
                                @if ($defualt_currency && !empty($countrycurrency['code_currency_default']))
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input id="code_currency_default" name="code_currency_default"
                                                    class="mr-2" type="checkbox" checked>
                                                Moneda por defecto
                                            </label>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input id="code_currency_default" name="code_currency_default"
                                                    class="mr-2" type="checkbox">
                                                Moneda por defecto
                                            </label>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-6">

                                    <div class="checkbox">
                                        <label><input id="is_activated" name="is_activated" class="mr-2"
                                                type="checkbox" checked>Activado</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mr-2">Modificar</button>
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
