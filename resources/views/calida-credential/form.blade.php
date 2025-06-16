<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="usuario" class="form-label">{{ __('Usuario') }}</label>
            <input type="text" name="usuario" class="form-control @error('usuario') is-invalid @enderror" value="{{ old('usuario', $calidaCredential?->usuario) }}" id="usuario" placeholder="Usuario">
            {!! $errors->first('usuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tokencontra" class="form-label">{{ __('Tokencontra') }}</label>
            <input type="text" name="tokencontra" class="form-control @error('tokencontra') is-invalid @enderror" value="{{ old('tokencontra', $calidaCredential?->tokencontra) }}" id="tokencontra" placeholder="Tokencontra">
            {!! $errors->first('tokencontra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>