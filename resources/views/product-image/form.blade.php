<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="is_activated" class="form-label">{{ __('Is Activated') }}</label>
            <input type="text" name="is_activated" class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $productImage?->is_activated) }}" id="is_activated" placeholder="Is Activated">
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="product_id" class="form-label">{{ __('Product Id') }}</label>
            <input type="text" name="product_id" class="form-control @error('product_id') is-invalid @enderror" value="{{ old('product_id', $productImage?->product_id) }}" id="product_id" placeholder="Product Id">
            {!! $errors->first('product_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="path_image" class="form-label">{{ __('Path Image') }}</label>
            <input type="text" name="path_image" class="form-control @error('path_image') is-invalid @enderror" value="{{ old('path_image', $productImage?->path_image) }}" id="path_image" placeholder="Path Image">
            {!! $errors->first('path_image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
