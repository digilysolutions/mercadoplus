<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $contact?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="family_number" class="form-label">{{ __('Family Number') }}</label>
            <input type="text" name="family_number" class="form-control @error('family_number') is-invalid @enderror" value="{{ old('family_number', $contact?->family_number) }}" id="family_number" placeholder="Family Number">
            {!! $errors->first('family_number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="alternate_number" class="form-label">{{ __('Alternate Number') }}</label>
            <input type="text" name="alternate_number" class="form-control @error('alternate_number') is-invalid @enderror" value="{{ old('alternate_number', $contact?->alternate_number) }}" id="alternate_number" placeholder="Alternate Number">
            {!! $errors->first('alternate_number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="mobile" class="form-label">{{ __('Mobile') }}</label>
            <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile', $contact?->mobile) }}" id="mobile" placeholder="Mobile">
            {!! $errors->first('mobile', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Phone') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $contact?->phone) }}" id="phone" placeholder="Phone">
            {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="location_id" class="form-label">{{ __('Location Id') }}</label>
            <input type="text" name="location_id" class="form-control @error('location_id') is-invalid @enderror" value="{{ old('location_id', $contact?->location_id) }}" id="location_id" placeholder="Location Id">
            {!! $errors->first('location_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_activated" class="form-label">{{ __('Is Activated') }}</label>
            <input type="text" name="is_activated" class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $contact?->is_activated) }}" id="is_activated" placeholder="Is Activated">
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
