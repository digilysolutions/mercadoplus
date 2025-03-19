<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="certification_id" class="form-label">{{ __('Certification Id') }}</label>
            <input type="text" name="certification_id" class="form-control @error('certification_id') is-invalid @enderror" value="{{ old('certification_id', $businessCertification?->certification_id) }}" id="certification_id" placeholder="Certification Id">
            {!! $errors->first('certification_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="business_id" class="form-label">{{ __('Business Id') }}</label>
            <input type="text" name="business_id" class="form-control @error('business_id') is-invalid @enderror" value="{{ old('business_id', $businessCertification?->business_id) }}" id="business_id" placeholder="Business Id">
            {!! $errors->first('business_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="delivery" class="form-label">{{ __('Delivery') }}</label>
            <input type="text" name="delivery" class="form-control @error('delivery') is-invalid @enderror" value="{{ old('delivery', $businessCertification?->delivery) }}" id="delivery" placeholder="Delivery">
            {!! $errors->first('delivery', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_activated" class="form-label">{{ __('Is Activated') }}</label>
            <input type="text" name="is_activated" class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $businessCertification?->is_activated) }}" id="is_activated" placeholder="Is Activated">
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
