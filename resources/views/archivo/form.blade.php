<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $archivo?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="file_name" class="form-label">{{ __('File Name') }}</label>
            <input type="text" name="file_name" class="form-control @error('file_name') is-invalid @enderror" value="{{ old('file_name', $archivo?->file_name) }}" id="file_name" placeholder="File Name">
            {!! $errors->first('file_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="mime_type" class="form-label">{{ __('Mime Type') }}</label>
            <input type="text" name="mime_type" class="form-control @error('mime_type') is-invalid @enderror" value="{{ old('mime_type', $archivo?->mime_type) }}" id="mime_type" placeholder="Mime Type">
            {!! $errors->first('mime_type', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="path" class="form-label">{{ __('Path') }}</label>
            <input type="text" name="path" class="form-control @error('path') is-invalid @enderror" value="{{ old('path', $archivo?->path) }}" id="path" placeholder="Path">
            {!! $errors->first('path', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="size" class="form-label">{{ __('Size') }}</label>
            <input type="text" name="size" class="form-control @error('size') is-invalid @enderror" value="{{ old('size', $archivo?->size) }}" id="size" placeholder="Size">
            {!! $errors->first('size', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="disk" class="form-label">{{ __('Disk') }}</label>
            <input type="text" name="disk" class="form-control @error('disk') is-invalid @enderror" value="{{ old('disk', $archivo?->disk) }}" id="disk" placeholder="Disk">
            {!! $errors->first('disk', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>