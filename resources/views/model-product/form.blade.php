<div class="row padding-1 p-1">
    <div class="row">

        <div class="form-group col-lg-6">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $modelProduct?->name) }}" id="name" placeholder="{{ __('Name') }}">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                value="{{ old('description', $modelProduct?->description) }}" id="description"
                placeholder="{{ __('Description') }}">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="year" class="form-label">{{ __('Year') }}</label>
            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror"
                value="{{ old('year', $modelProduct?->year) }}" id="year" placeholder="{{ __('Year') }}">
            {!! $errors->first('year', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group col-lg-6">
            <label for="characteristics" class="form-label">{{ __('Characteristics') }}</label>
            <input type="text" name="characteristics"
                class="form-control @error('characteristics') is-invalid @enderror"
                value="{{ old('characteristics', $modelProduct?->characteristics) }}" id="characteristics"
                placeholder="{{ __('Characteristics') }}">
            {!! $errors->first(
                'characteristics',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="brand" class="form-label">Selecciona una Marca *</label>
                <select id="brand_id" name="brand_id" class="form-control" required>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @if ($brand->id == $modelProduct->brand_id) selected @endif>
                            {{ $brand->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="form-group mb-2 mb20">
            <div class="checkbox">
                <label><input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                        checked
                         class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $modelProduct?->is_activated) }}" id="is_activated"
                        >Activado</label>
            </div>           
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
