<div class="row padding-1 p-1">
    <div class="col-md-12">


        <div class="form-group mb-2 mb20">
            <label for="comment" class="form-label">{{ __('Comment') }}</label>
            <textarea  name="comment" class="form-control @error('comment') is-invalid @enderror"  id="comment" placeholder="{{ __('Comment') }}">{{ old('comment', $review?->comment) }}   </textarea>
            {!! $errors->first('comment', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <div class="checkbox">
                <label><input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                        checked
                         class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $review?->is_activated) }}" id="is_activated"
                        >Activado</label>
            </div>           
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
