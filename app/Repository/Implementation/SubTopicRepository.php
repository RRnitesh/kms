<?php

namespace App\Repository\Implementation;

use App\Models\SubTopic;
use App\Repository\Interface\SubTopicRepositoryInterface;

class SubTopicRepository extends BaseRepository implements SubTopicRepositoryInterface
{
  protected $model;

    public function __construct(SubTopic $model) {
      parent::__construct($model);
      $this->model = $model;
    }

}