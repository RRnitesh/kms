<?php

namespace App\Services\Interface;

use Illuminate\Http\UploadedFile;

interface FileUpLoadServiceInterface{

      /**
     * Store the uploaded file and return its storage path.
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param string $disk
     * @return string
     */

    public function store(UploadedFile $file, string $directory, string $disk = 'public'): string;
}