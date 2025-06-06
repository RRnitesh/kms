<?php


namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Contracts\UserRepositoryInterface;

// our user repo implements baserepointerface
class UserRepository extends BaseRepository implements UserRepositoryInterface{

  // we define the model name here and pass that to the base repo 
  public function __construct(User $model) {
    parent::__construct($model);
  }

  // any method that is defined in the userrepo are to be used here only
  // public function getVerifiedUsers() {
  //   return $this->model->where('is_verified', true)->get();
  // }



}