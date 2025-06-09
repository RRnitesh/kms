<?php

use App\Models\User;

class AuthRepository
{
  protected $model;
  public function __construct(User $model) {
    $this->model = $model;
  }

  public function checkLogin()  {


  }
}