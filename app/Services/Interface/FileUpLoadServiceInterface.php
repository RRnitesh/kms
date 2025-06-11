<?php

namespace App\Services\Interface;

use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;


interface FileUpLoadServiceInterface{

    public function uploadFile(
        UploadedFile $file, 
        string $path, 
        string $disk = 'public', 
        ?string $oldFilename = null,
        ?int $ownerId = null,
        ?string $context = null): string;
     
        
    public function deleteAndTrash(
        string $filename,
        string $path,
        string $disk = 'public',
        ?int $ownerId = null,
        ?string $context = null
    ): bool;

    public function downloadFile(
        string $filename,
        string $path,
        string $disk = 'public',
    );
}
