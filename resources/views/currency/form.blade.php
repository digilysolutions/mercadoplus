<div class="row padding-1 p-1">


        <div class="form-group col-lg-6">
            <label for="currency" class="form-label">{{ __('Currency') }} *</label>
            <input type="text" name="currency" class="form-control @error('currency') is-invalid @enderror" value="{{ old('currency', $currency?->currency) }}" id="currency" placeholder="{{ __('Currency') }}">
            {!! $errors->first('currency', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="country" class="form-label">{{ __('Country') }} *</label>
            <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country', $currency?->country) }}" id="country" placeholder="{{ __('Country') }}">
            {!! $errors->first('country', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group col-lg-6">
            <label for="code" class="form-label">{{ __('Code') }} *</label>
            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $currency?->code) }}" id="code" placeholder="{{ __('code') }}">
            {!! $errors->first('code', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="symbol" class="form-label">{{ __('Symbol') }} *</label>
            <input type="text" name="symbol" class="form-control @error('symbol') is-invalid @enderror" value="{{ old('symbol', $currency?->symbol) }}" id="symbol" placeholder="{{ __('Symbol') }}">
            {!! $errors->first('symbol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="thousand_separator" class="form-label">{{ __('Separador de mile') }} *</label>
            <input type="text" name="thousand_separator" class="form-control @error('thousand_separator') is-invalid @enderror" value="{{ old('thousand_separator', $currency?->thousand_separator) }}" id="thousand_separator" placeholder="Separador de mile">
            {!! $errors->first('thousand_separator', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="decimal_separator" class="form-label">{{ __('Separador decimal') }} *</label>
            <input type="text" name="decimal_separator" class="form-control @error('decimal_separator') is-invalid @enderror" value="{{ old('decimal_separator', $currency?->decimal_separator) }}" id="decimal_separator" placeholder="Separador decimal">
            {!! $errors->first('decimal_separator', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <div class="checkbox">
                <label><input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                        checked
                         class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $currency?->is_activated) }}" id="is_activated"
                        >Activado</label>
            </div>
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
