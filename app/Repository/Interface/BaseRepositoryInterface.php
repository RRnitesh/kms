<?php

namespace App\Repository\Interface;


interface BaseRepositoryInterface{

  public function all();
  // allow optional per page override based on different model
  public function paginate(? int $perPage = null);

  public function getModel();
  public function find($id);
  public function create($data);  
  public function update($id,array $data);
  public function delete($id);
}
