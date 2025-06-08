<?php

namespace App\Repository\Implementation;

use App\Repository\Interface\BaseRepositoryInterface;
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

  // public function all(){
  //   return $this->model->all();
  // }
  

  public function find($id){
    return $this->model->findOrFail($id);
  }

  // keep the pagination here only
  public function paginate(?int $perPage = null){
    $perPage = $perPage ?? config('pagination.default');
    return $this->model->paginate($perPage);
  }

  public function create($data){
    return $this->model->create($data);
  }

  public function update($id, array $data) {
        $user = $this->model->find($id);
        if (!$user) {
            return false;
        }
        $user->update($data);
        return $user;
  }

  public function delete($id){
    return $this->find($id)->delete();
  }


}