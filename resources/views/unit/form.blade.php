<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $unit?->name) }}" id="name" placeholder="{{ __('Name') }}" required>
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('shortname') }}</label>
            <input type="text" name="shortname" class="form-control @error('shortname') is-invalid @enderror" value="{{ old('shortname', $unit?->shortname) }}" id="name" placeholder="{{ __('shortname') }}" required>
            {!! $errors->first('shortname', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="attribute_id" class="form-label">{{ __('Attribute') }}</label>
            <select id="unitbase_id" name="unitbase_id" class="form-control">
                @foreach ($unitsBase as $unitbase)
                    <option value="{{ $unitbase->id }}"   @if ($unit->unitbase_id==$unitbase->id)
                        selected
                    @endif                                             >
                        {{ $unitbase->name }}</option>
                @endforeach

            </select>
            {!! $errors->first('attribute_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
     
        <div class="form-group mb-2 mb20">
            <div class="checkbox">
                <label><input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                        checked
                         class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $unit?->is_activated) }}" id="is_activated"
                        >Activado</label>
            </div>           
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
