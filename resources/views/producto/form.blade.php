<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="tienda_id">Tienda</label>
            <select name="tienda_id" id="tienda_id" class="form-control @error('tienda_id') is-invalid @enderror">
                <option disabled selected>Seleccione una tienda</option>
                @foreach($tiendas as $tienda)
                    <option value="{{ $tienda->id }}" {{ old('tienda_id', $producto?->tienda_id) == $tienda->id ? 'selected' : '' }}>
                        {{ $tienda->nombre }}
                    </option>
                @endforeach
            </select>
            @error('tienda_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $producto?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="precio" class="form-label">{{ __('Precio con IGV') }}</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $producto?->precio) }}" id="precio" placeholder="Precio">
            {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <textarea
                name="descripcion"
                id="descripcion"
                class="form-control @error('descripcion') is-invalid @enderror"
                placeholder="[Marca y Modelo], [Almacenamiento] GB, [RAM] GB RAM, [Cámara Principal] MP, [Pantalla] pulgadas, [Batería] mAh, [Sistema Operativo]"
                rows="3">{{ old('descripcion', $producto?->descripcion) }}</textarea>
            @error('descripcion')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>