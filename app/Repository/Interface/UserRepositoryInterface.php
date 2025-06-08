<?php

namespace App\Repository\Interface;

use App\DTO\UserDTO\UserSaveDTO;
use Illuminate\Http\UploadedFile;

// all the crud operation is define at baserepositoryinterface 
interface UserRepositoryInterface extends BaseRepositoryInterface{

    public function createUserWithImage(array $data);
}
