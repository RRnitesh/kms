<?php

namespace App\Services\Interface;

use App\Repository\Interface\BaseRepositoryInterface;

interface BaseServiceInterface extends BaseRepositoryInterface{
      public function moveToTrash($id, $oldProfilePath);
}


