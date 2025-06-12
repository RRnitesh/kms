<?php

namespace App\Services\Interface;


interface BaseServiceInterface
{
    public function getAll();

    public function getPaginated(?int $perPage = null);

    public function getById($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function getWithRelations($id, array $relations);
}



