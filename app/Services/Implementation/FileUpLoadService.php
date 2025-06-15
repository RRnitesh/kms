<?php

namespace App\Services\Implementation;

use App\Services\Interface\FileUpLoadServiceInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Constant\Upload;
use App\Models\Trash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Response;

class FileUpLoadService implements FileUpLoadServiceInterface
{
    public function uploadFile(
        UploadedFile $file,
        string $path,
        string $disk = 'public',
        ?string $oldFilename = null,
        ?int $ownerId = null,
        ?string $context = null

    ): string {
        if ($oldFilename) {

            $this->moveToTrash($oldFilename, $path, $disk, $ownerId, $context);
        }
        
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        
        $extension = $file->getClientOriginalExtension();
        $filename = $originalName . '_' . now()->timestamp . '.' . $extension;

        $file->storeAs($path, $filename, $disk);

        return $filename;
    }

    public function deleteAndTrash(
        string $filename,
        string $path,
        string $disk = 'public',
        ?int $ownerId = null,
        ?string $context = null
    ): bool {
        $this->moveToTrash($filename, $path, $disk, $ownerId, $context);
        return true;
    }

    protected function moveToTrash(
        $oldFilename,
        $originalPath,
        $disk,
        ?int $ownerId = null,
        ?string $context = null
    ): void {
        $trashDir = Upload::TRASH_FOLDER;
        $oldPath = $originalPath . '/' . $oldFilename;
        $newPath = $trashDir . '/'. '$id' . $oldFilename;
        
      

        Storage::disk($disk)->move($oldPath, $newPath);

       



        Trash::create([
            'user_id' => $ownerId, 
            'data_id' => 1,
            'old_path' => $oldPath,
            'trashed_path' => $newPath,
        ]);
    }

    public function downloadFile(
        string $filename,
        string $path,
        string $disk = 'public'
    ) {
        $filePath = $path . '/' . $filename;

        if (!Storage::disk($disk)->exists($filePath)) {
            abort(404, 'File not found');
        }

        $absoultePath = Storage::disk($disk)->path($filePath);

         return response()->download($absoultePath, $filename);
         
    }
}
