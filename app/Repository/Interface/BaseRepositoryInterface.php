<?php

namespace App\Repository\Interface;

use Illuminate\Support\Facades\Log;


interface BaseRepositoryInterface{

  public function all();
  public function paginate(? int $perPage = null);
  public function with($relations);
  public function getModel();
  public function find($id);
  public function create($data);  
  public function update($id,array $data);
  public function delete($id);
}
