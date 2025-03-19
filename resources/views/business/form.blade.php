<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $business?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $business?->description) }}" id="description" placeholder="Description">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="industry" class="form-label">{{ __('Industry') }}</label>
            <input type="text" name="industry" class="form-control @error('industry') is-invalid @enderror" value="{{ old('industry', $business?->industry) }}" id="industry" placeholder="Industry">
            {!! $errors->first('industry', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="website" class="form-label">{{ __('Website') }}</label>
            <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website', $business?->website) }}" id="website" placeholder="Website">
            {!! $errors->first('website', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_activated" class="form-label">{{ __('Is Activated') }}</label>
            <input type="text" name="is_activated" class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $business?->is_activated) }}" id="is_activated" placeholder="Is Activated">
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="logo" class="form-label">{{ __('Logo') }}</label>
            <input type="text" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo', $business?->logo) }}" id="logo" placeholder="Logo">
            {!! $errors->first('logo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="currency_id" class="form-label">{{ __('Currency Id') }}</label>
            <input type="text" name="currency_id" class="form-control @error('currency_id') is-invalid @enderror" value="{{ old('currency_id', $business?->currency_id) }}" id="currency_id" placeholder="Currency Id">
            {!! $errors->first('currency_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="contact_id" class="form-label">{{ __('Contact Id') }}</label>
            <input type="text" name="contact_id" class="form-control @error('contact_id') is-invalid @enderror" value="{{ old('contact_id', $business?->contact_id) }}" id="contact_id" placeholder="Contact Id">
            {!! $errors->first('contact_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="owner_id" class="form-label">{{ __('Owner Id') }}</label>
            <input type="text" name="owner_id" class="form-control @error('owner_id') is-invalid @enderror" value="{{ old('owner_id', $business?->owner_id) }}" id="owner_id" placeholder="Owner Id">
            {!! $errors->first('owner_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
