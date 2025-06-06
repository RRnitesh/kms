<?php

namespace App\Repository\Contracts;


interface BaseRepositoryInterface{
  public function all();
  public function getModel();
  public function find($id);

  
  // public function create(array $data);  
  // public function update($id, array $data);
  // public function delete($id);
}
