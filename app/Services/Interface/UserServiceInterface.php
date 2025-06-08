<?php

namespace App\Services\Interface;

use App\DTO\UserDTO\UserSaveDTO;
use App\Repository\Interface\UserRepositoryInterface;
use Illuminate\Http\UploadedFile;

interface UserServiceInterface extends BaseServiceInterface 
{
      public function createUserWithImage(UserSaveDTO $dto, ?UploadedFile $file = null);
}