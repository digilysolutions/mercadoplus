<div class="row padding-1 p-1">
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
                        <option value="{{ $currency->id }}" @if($currency->id == $countryCurrency->currency_id) selected @endif>
                            {{ $currency['code'] }}
                            - {{ $currency['currency'] }}</option>
                    @endforeach

                </select>

                <div class="help-block with-errors">
                </div>
            </div>
        </div>

        <div class="col-md-12 ">
            <label>Tasa de Cambio @if($defualt_currency )<b class="text-warning">(Moneda por defecto {{ $defualt_currency->currency->code }})</b> @endif</label>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control" name="exchange_rate" id="exchange_rate"  value="{{ old('exchange_rate', $countryCurrency?->exchange_rate) }}"       >

            </div>
        </div>

        @if(!$defualt_currency)
        <div class="col-md-6">

            <div class="checkbox">
                <label><input id="code_currency_default" name="code_currency_default" class="mr-2"
                        type="checkbox" checked>Moneda por defecto</label>
            </div>
        </div>
        @endif
        <div class="form-group mb-2 mb20">
            <div class="checkbox">
                <label><input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                        checked
                         class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $countryCurrency?->is_activated) }}" id="is_activated"
                        >Activado</label>
            </div>
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
