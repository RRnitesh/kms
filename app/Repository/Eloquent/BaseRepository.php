<?php

namespace App\Repository\Eloquent;

use App\Repository\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface {

  protected  $model;

  // this model will come from the specific repo ; 
  // user repo will call give model User
  public function __construct( $model) {
    $this->model = $model;
  }

  public  function getModel(){
    return $this->model;
  }

  public function all(){
    return $this->model->all();
  }
  

  public function find($id){
    return $this->model->findOrFail($id);
  }

  // public function create(array $data){
  //   return $this->model->create($data);
  // }

  // public function update($id, array $data) {
  //       $user = $this->model->find($id);

  //       if (!$user) {
  //           return false;
  //       }

  //       $user->update($data);
  //       return $user;
  // }

  // public function delete($id){
  //   return $this->find($id)->delete();
  // }


}