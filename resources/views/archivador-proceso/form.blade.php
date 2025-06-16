<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="cotizacion_id" class="form-label">{{ __('Cotizacion Id') }}</label>
            <input type="text" name="cotizacion_id" class="form-control @error('cotizacion_id') is-invalid @enderror" value="{{ old('cotizacion_id', $archivadorProceso?->cotizacion_id) }}" id="cotizacion_id" placeholder="Cotizacion Id">
            {!! $errors->first('cotizacion_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="clave" class="form-label">{{ __('Clave') }}</label>
            <input type="text" name="clave" class="form-control @error('clave') is-invalid @enderror" value="{{ old('clave', $archivadorProceso?->clave) }}" id="clave" placeholder="Clave">
            {!! $errors->first('clave', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="valor" class="form-label">{{ __('Valor') }}</label>
            <input type="text" name="valor" class="form-control @error('valor') is-invalid @enderror" value="{{ old('valor', $archivadorProceso?->valor) }}" id="valor" placeholder="Valor">
            {!! $errors->first('valor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>