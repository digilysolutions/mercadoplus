<div class="row padding-1 p-1">


        <div class="form-group col-md-6">
            <label for="name" class="form-label">{{ __('Nombre') }} </label>
            <input type="text" name="name" class="form-control " value="{{ old('name', $user?->person?->name) }}"
                id="name" placeholder="Nombre" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6">
            <label for="lastname" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror"
                value="{{ old('lastname', $user?->person?->lastname) }}" id="lastname" placeholder="Apellidos">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6">
            <label for="email" class="form-label">{{ __('Correo') }}</label>
            <input type="text" id="mail" name="email"
                class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user?->email) }}"
                id="email" placeholder="Correo">
            <div class="help-block with-errors"></div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="phone" class="form-label">{{ __('Teléfono') }} */label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone', $user?->person?->phone) }}" id="phone" placeholder="Teléfono" required>
            <div class="help-block with-errors"></div>
        </div>


        <div class="form-group col-md-12">
            <label for="name" class="form-label">{{ __('Usuario') }} *</label>
            <input type="text" name="username" class="form-control " value="{{ old('username', $user?->person?->user->name) }}"
                id="username" placeholder="Usuario" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="password" class="form-label">{{ __('Contraseña') }} *</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                 id="password" placeholder="Contraseña">
            <div class="help-block with-errors"></div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
