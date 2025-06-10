<?php

namespace App\Services\Interface;

use App\DTO\UserDTO\UserSaveDTO;
use App\Repository\Interface\UserRepositoryInterface;
use Illuminate\Http\UploadedFile;

interface UserServiceInterface extends BaseServiceInterface 
{
      public function createUserWithImage(UserSaveDTO $dto, ?UploadedFile $file = null);

      public function updateUser($id, $request, ?UploadedFile $file = null);

      // public function moveToTrash($id, $oldProfilePath);
}