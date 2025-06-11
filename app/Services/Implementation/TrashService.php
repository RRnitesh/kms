<?php

namespace App\Services\Implementation;

use App\Models\Trash;

class TrashService extends BaseService
{
  public function __construct() {
    parent::__construct(new Trash());
  }
}