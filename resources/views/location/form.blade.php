<div class="row padding-1 p-1">


        <div class="form-group col-lg-6">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $location?->name) }}" id="name" placeholder="{{ __('Name') }}" required>
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $location?->description) }}" id="description" placeholder="{{ __('Description') }}">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="zip_code" class="form-label">{{ __('Zip Code') }}</label>
            <input type="text" name="zip_code" class="form-control @error('zip_code') is-invalid @enderror" value="{{ old('zip_code', $location?->zip_code) }}" id="zip_code" placeholder="{{ __('Zip Code') }}">
            {!! $errors->first('zip_code', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="city" class="form-label">{{ __('City') }}</label>
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $location?->city) }}" id="city" placeholder="{{ __('City') }}">
            {!! $errors->first('city', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="landmark" class="form-label">{{ __('Landmark') }}</label>
            <input type="text" name="landmark" class="form-control @error('landmark') is-invalid @enderror" value="{{ old('landmark', $location?->landmark) }}" id="landmark" placeholder="{{ __('Landmark') }}">
            {!! $errors->first('landmark', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="municipality_id" class="form-label">{{ __('Municipality') }}</label>
            <select id="municipality_id" name="municipality_id" class="form-control">
                @foreach ($municipalities as $municipality)
                    <option value="{{ $municipality->id }}"   @if ($location->municipality_id==$municipality->id)
                        selected
                    @endif                                             >
                        {{ $municipality->name }}</option>
                @endforeach

            </select>
            {!! $errors->first('attribute_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-12">
            <label for="address" class="form-label">{{ __('Address') }}</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $location?->address) }}" id="address" placeholder="{{ __('Address') }}">
            {!! $errors->first('address', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="form-group mb-2 mb20">
            <div class="checkbox">
                <label><input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                        checked
                         class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $location?->is_activated) }}" id="is_activated"
                        >Activado</label>
            </div>
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
