<?php

namespace App\Services\Interface;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\StreamedResponse;

interface FileUpLoadServiceInterface{

    public function uploadImage(UploadedFile $file, string $path, string $disk = 'public'): string;

    /**
     * Get the public URL to view the file.
     */
    // public function view(string $path, string $disk = 'public'): string;

    // /**
    //  * Download the file as a streamed response.
    //  */
    // public function download(string $path, string $disk = 'public'): StreamedResponse;

    // /**
    //  * Delete the file from storage.
    //  */
    // public function delete(string $path, string $disk = 'public'): bool;

}