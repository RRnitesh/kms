<?php

namespace App\Repository\Implementation;

use App\Repository\Interface\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;



class BaseRepository implements BaseRepositoryInterface {

  protected  $model;
  protected array $with = []; // for join 

  // this model will come from the child classes that inherit the base repo 
  // userrepo, topicrepo will inject their model here.
  public function __construct( $model) {
    $this->model = $model;
  }

  // service provide multiple model (['']) 
  public function with($relations)
  {
    $this->with = $relations;
    return $this; // this allows chaining meaning user, category, model ...
  }

  public  function getModel(){
    return $this->model;
  }

  public function all(){
    return $this->model->all();
  }
  
  public function find($id){
    $result =  $this->model->with($this->with)->findOrFail($id);
    $this->with = [];
    return $result;
  }

  // keep the pagination here only
  public function paginate(?int $perPage = null){
    $perPage = $perPage ?? config('pagination.default');
    return $this->model->with($this->with)->paginate($perPage);
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