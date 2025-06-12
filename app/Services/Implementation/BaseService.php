<?php

namespace App\Services\Implementation;

use App\Repository\Interface\BaseRepositoryInterface;
use App\Services\Interface\BaseServiceInterface;

class BaseService implements BaseServiceInterface
{
    protected $repository;

    // this repository is topicRepo or any other repo implementing BaseRepositoryInterface
    public function __construct(BaseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getModel()
    {
        return $this->repository->getModel();
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function getPaginated(?int $perPage = null)
    {
        return $this->repository->paginate($perPage);
    }

    public function getById($id)
    {
        return $this->repository->find($id);
    }

    public function create($data)
    {
        $dataArray = $this->convertToArray($data);
        return $this->repository->create($dataArray);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    
    public function getWithRelations($id, array $relations)
    {
        return $this->repository->with($relations)->find($id);
    }


    protected function convertToArray($data)
    {
        if (is_object($data) && method_exists($data, 'toArray')) {
            return $data->toArray();
        }
        return (array) $data;
    }
}
