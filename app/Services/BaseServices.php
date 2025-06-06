<?php
// this is the base service -> other service will inject their interface and this has to work on that
// table 
namespace App\Services;

use App\Repository\Contracts\BaseRepositoryInterface;

class BaseServices implements BaseRepositoryInterface{

    protected BaseRepositoryInterface $repository;
  // here baseservice can only work on those method that is defined by
  // by the interface ; as long as UserRepo implements the
  // inside the hood we are getting the userrepointerface but we reference to the 
  // baserepinterface only meaning we cannot access method other then the 
  // baseinterface itself;
    public function __construct(BaseRepositoryInterface $repository) {
      $this->repository = $repository;
    }

    public function getModel(){
      return $this->repository->getModel();    
    }

    public function all(){
      return $this->repository->all();
    }

    public function find($id){
      return $this->repository->find($id);
    }

} 