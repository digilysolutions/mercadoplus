<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="is_activated" class="form-label">{{ __('Is Activated') }}</label>
            <input type="text" name="is_activated" class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $businessEmployee?->is_activated) }}" id="is_activated" placeholder="Is Activated">
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="employee_id" class="form-label">{{ __('Employee Id') }}</label>
            <input type="text" name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" value="{{ old('employee_id', $businessEmployee?->employee_id) }}" id="employee_id" placeholder="Employee Id">
            {!! $errors->first('employee_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="business_id" class="form-label">{{ __('Business Id') }}</label>
            <input type="text" name="business_id" class="form-control @error('business_id') is-invalid @enderror" value="{{ old('business_id', $businessEmployee?->business_id) }}" id="business_id" placeholder="Business Id">
            {!! $errors->first('business_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hire_date" class="form-label">{{ __('Hiredate') }}</label>
            <input type="text" name="hireDate" class="form-control @error('hireDate') is-invalid @enderror" value="{{ old('hireDate', $businessEmployee?->hireDate) }}" id="hire_date" placeholder="Hiredate">
            {!! $errors->first('hireDate', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email_business" class="form-label">{{ __('Email Business') }}</label>
            <input type="text" name="email_business" class="form-control @error('email_business') is-invalid @enderror" value="{{ old('email_business', $businessEmployee?->email_business) }}" id="email_business" placeholder="Email Business">
            {!! $errors->first('email_business', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="person_statuses_id" class="form-label">{{ __('Person Statuses Id') }}</label>
            <input type="text" name="person_statuses_id" class="form-control @error('person_statuses_id') is-invalid @enderror" value="{{ old('person_statuses_id', $businessEmployee?->person_statuses_id) }}" id="person_statuses_id" placeholder="Person Statuses Id">
            {!! $errors->first('person_statuses_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="person_statuses_message" class="form-label">{{ __('Person Statuses Message') }}</label>
            <input type="text" name="person_statuses_message" class="form-control @error('person_statuses_message') is-invalid @enderror" value="{{ old('person_statuses_message', $businessEmployee?->person_statuses_message) }}" id="person_statuses_message" placeholder="Person Statuses Message">
            {!! $errors->first('person_statuses_message', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="job_title" class="form-label">{{ __('Jobtitle') }}</label>
            <input type="text" name="jobTitle" class="form-control @error('jobTitle') is-invalid @enderror" value="{{ old('jobTitle', $businessEmployee?->jobTitle) }}" id="job_title" placeholder="Jobtitle">
            {!! $errors->first('jobTitle', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="department" class="form-label">{{ __('Department') }}</label>
            <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" value="{{ old('department', $businessEmployee?->department) }}" id="department" placeholder="Department">
            {!! $errors->first('department', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="role" class="form-label">{{ __('Role') }}</label>
            <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role', $businessEmployee?->role) }}" id="role" placeholder="Role">
            {!! $errors->first('role', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="salary" class="form-label">{{ __('Salary') }}</label>
            <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary', $businessEmployee?->salary) }}" id="salary" placeholder="Salary">
            {!! $errors->first('salary', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
