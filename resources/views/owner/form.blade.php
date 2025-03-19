<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="is_activated" class="form-label">{{ __('Is Activated') }}</label>
            <input type="text" name="is_activated" class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $owner?->is_activated) }}" id="is_activated" placeholder="Is Activated">
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="person_id" class="form-label">{{ __('Person Id') }}</label>
            <input type="text" name="person_id" class="form-control @error('person_id') is-invalid @enderror" value="{{ old('person_id', $owner?->person_id) }}" id="person_id" placeholder="Person Id">
            {!! $errors->first('person_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="person_statuses_message" class="form-label">{{ __('Person Statuses Message') }}</label>
            <input type="text" name="person_statuses_message" class="form-control @error('person_statuses_message') is-invalid @enderror" value="{{ old('person_statuses_message', $owner?->person_statuses_message) }}" id="person_statuses_message" placeholder="Person Statuses Message">
            {!! $errors->first('person_statuses_message', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
