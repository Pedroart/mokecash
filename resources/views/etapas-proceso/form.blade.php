<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="cotizacion_id" class="form-label">{{ __('Cotizacion Id') }}</label>
            <input type="text" name="cotizacion_id" class="form-control @error('cotizacion_id') is-invalid @enderror" value="{{ old('cotizacion_id', $etapasProceso?->cotizacion_id) }}" id="cotizacion_id" placeholder="Cotizacion Id">
            {!! $errors->first('cotizacion_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $etapasProceso?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>