<?php

namespace App\Traits;

use App\Models\Archivo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HandlesFileUploads
{
    public function guardarArchivo(
        UploadedFile $file,
        string $nombreVisible,
        ?string $carpeta = 'uploads',
        string $disk = 'public'
    ): Archivo {
        // Genera un nombre único para el archivo
        $hashedName = $file->hashName(); // incluye extensión

        // Guarda el archivo con nombre hasheado
        $path = $file->storeAs($carpeta, $hashedName, $disk);

        // Crea el registro en la base de datos
        return Archivo::create([
            'nombre' => $nombreVisible,
            'file_name' => $file->getClientOriginalName(), // nombre original
            'mime_type' => $file->getMimeType(),
            'path' => $path,
            'size' => $file->getSize(),
            'disk' => $disk,
        ]);
    }
}
