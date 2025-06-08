<?php

namespace App\Services\Implementation;

use App\Services\Interface\FileUpLoadServiceInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUpLoadService implements FileUpLoadServiceInterface{
    /**
     * Store the uploaded file and return its path.
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param string $disk
     * @return string
     */
    public function store(UploadedFile $file, string $directory, string $disk = 'public'): string
    {
        return $file->store($directory, $disk);
    }
}