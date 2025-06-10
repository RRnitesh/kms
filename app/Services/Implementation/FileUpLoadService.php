<?php

namespace App\Services\Implementation;

use App\Services\Interface\FileUpLoadServiceInterface;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUpLoadService implements FileUpLoadServiceInterface{
    public function uploadImage(UploadedFile $file, string $path, string $disk = 'public'): string
    {
        // dd($file, $path);
        // fcheck file - exist ?
        // return false
        // true ? ? path wise file exit xa kix aina file path ? 
        // if yes ?? pruarno trash gayo ;naya create vayo ; 
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);



        $extension = $file->getClientOriginalExtension();
        
        $filename = $originalName . '_' . now()->timestamp . '.' . $extension;

        $file->storeAs($path, $filename, $disk);
        
        // this is saved in the database.
        return $filename;
    }

    // public function view(string $path, string $disk = 'public'): string
    // {
    //     if ($disk === 'public') {
    //         return asset('storage/' . ltrim($path, '/'));
    //     }

    //     // For S3 or other disks that support url()
    //     $driver = Storage::disk($disk);
    //     if (method_exists($driver, 'url')) {
    //         return $driver->url($path);
    //     }
    //     // Fallback
    //     return '';
    // }


    //     public function download(string $path, string $disk = 'public'): StreamedResponse
    //     {
    //         $fullPath = Storage::disk($disk)->path($path);

    //         if (!file_exists($fullPath)) {
    //             abort(404, 'File not found.');
    //         }

    //         return Storage::disk($disk)->download($path);
    //     }

    // public function delete(string $path, string $disk = 'public'): bool
    // {
    //     return Storage::disk($disk)->delete($path);
    // }
}