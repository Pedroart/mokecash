<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="calida_credential_id" class="form-label">{{ __('Calida Credential Id') }}</label>
            <input type="text" name="calida_credential_id" class="form-control @error('calida_credential_id') is-invalid @enderror" value="{{ old('calida_credential_id', $calidaToken?->calida_credential_id) }}" id="calida_credential_id" placeholder="Calida Credential Id">
            {!! $errors->first('calida_credential_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="auth_token" class="form-label">{{ __('Auth Token') }}</label>
            <input type="text" name="auth_token" class="form-control @error('auth_token') is-invalid @enderror" value="{{ old('auth_token', $calidaToken?->auth_token) }}" id="auth_token" placeholder="Auth Token">
            {!! $errors->first('auth_token', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="aliado_id" class="form-label">{{ __('Aliado Id') }}</label>
            <input type="text" name="aliado_id" class="form-control @error('aliado_id') is-invalid @enderror" value="{{ old('aliado_id', $calidaToken?->aliado_id) }}" id="aliado_id" placeholder="Aliado Id">
            {!! $errors->first('aliado_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="expires_at" class="form-label">{{ __('Expires At') }}</label>
            <input type="text" name="expires_at" class="form-control @error('expires_at') is-invalid @enderror" value="{{ old('expires_at', $calidaToken?->expires_at) }}" id="expires_at" placeholder="Expires At">
            {!! $errors->first('expires_at', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>