<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="is_activated" class="form-label">{{ __('Is Activated') }}</label>
            <input type="text" name="is_activated" class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $productsVariation?->is_activated) }}" id="is_activated" placeholder="Is Activated">
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="variation_id" class="form-label">{{ __('Variation Id') }}</label>
            <input type="text" name="variation_id" class="form-control @error('variation_id') is-invalid @enderror" value="{{ old('variation_id', $productsVariation?->variation_id) }}" id="variation_id" placeholder="Variation Id">
            {!! $errors->first('variation_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="variations_term_id" class="form-label">{{ __('Variations Term Id') }}</label>
            <input type="text" name="variations_term_id" class="form-control @error('variations_term_id') is-invalid @enderror" value="{{ old('variations_term_id', $productsVariation?->variations_term_id) }}" id="variations_term_id" placeholder="Variations Term Id">
            {!! $errors->first('variations_term_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
