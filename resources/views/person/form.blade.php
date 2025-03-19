<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="first_name" class="form-label">{{ __('First Name') }}</label>
            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $person?->first_name) }}" id="first_name" placeholder="First Name">
            {!! $errors->first('first_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="middle_name" class="form-label">{{ __('Middle Name') }}</label>
            <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name', $person?->middle_name) }}" id="middle_name" placeholder="Middle Name">
            {!! $errors->first('middle_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $person?->last_name) }}" id="last_name" placeholder="Last Name">
            {!! $errors->first('last_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="gender" class="form-label">{{ __('Gender') }}</label>
            <input type="text" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender', $person?->gender) }}" id="gender" placeholder="Gender">
            {!! $errors->first('gender', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="marital_status" class="form-label">{{ __('Marital Status') }}</label>
            <input type="text" name="marital_status" class="form-control @error('marital_status') is-invalid @enderror" value="{{ old('marital_status', $person?->marital_status) }}" id="marital_status" placeholder="Marital Status">
            {!! $errors->first('marital_status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="blood_group" class="form-label">{{ __('Blood Group') }}</label>
            <input type="text" name="blood_group" class="form-control @error('blood_group') is-invalid @enderror" value="{{ old('blood_group', $person?->blood_group) }}" id="blood_group" placeholder="Blood Group">
            {!! $errors->first('blood_group', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="language" class="form-label">{{ __('Language') }}</label>
            <input type="text" name="language" class="form-control @error('language') is-invalid @enderror" value="{{ old('language', $person?->language) }}" id="language" placeholder="Language">
            {!! $errors->first('language', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="contact_id" class="form-label">{{ __('Contact Id') }}</label>
            <input type="text" name="contact_id" class="form-control @error('contact_id') is-invalid @enderror" value="{{ old('contact_id', $person?->contact_id) }}" id="contact_id" placeholder="Contact Id">
            {!! $errors->first('contact_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="person_statuses_id" class="form-label">{{ __('Person Statuses Id') }}</label>
            <input type="text" name="person_statuses_id" class="form-control @error('person_statuses_id') is-invalid @enderror" value="{{ old('person_statuses_id', $person?->person_statuses_id) }}" id="person_statuses_id" placeholder="Person Statuses Id">
            {!! $errors->first('person_statuses_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_activated" class="form-label">{{ __('Is Activated') }}</label>
            <input type="text" name="is_activated" class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $person?->is_activated) }}" id="is_activated" placeholder="Is Activated">
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $person?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
