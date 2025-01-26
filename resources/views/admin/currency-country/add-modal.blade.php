<div class="modal fade" id="new-countrycourrency" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Añadir Tasa de Cambio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                        <div class="card-body">
                        <form action="{{ route('countrycurrency.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
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
                                                <option value="{{ $currency['id'] }}" @if(in_array($currency['id'], $arrayCurrencies)) disabled @endif>
                                                    {{ $currency['code'] }}
                                                    - {{ $currency['currency'] }}</option>
                                            @endforeach

                                        </select>

                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 ">
                                    <label>Tasa de Cambio @if($defualt_currency )<b class="text-warning">(Moneda por defecto {{ $name_defualt_currency }})</b> @endif</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" name="exchange_rate" id="exchange_rate"                                            >
                                       
                                    </div>
                                </div>
                                
                                @if($defualt_currency==false)
                                <div class="col-md-6">

                                    <div class="checkbox">
                                        <label><input id="code_currency_default" name="code_currency_default" class="mr-2"
                                                type="checkbox" checked>Moneda por defecto</label>
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
                                <button type="submit" class="btn btn-primary mr-2">Añadir</button>
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                            </div>
                           
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
