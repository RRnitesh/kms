<?php

namespace App\Repository\Implementation;

use App\Models\Topic;
use App\Repository\Interface\TopicRepositoryInterface;

class TopicRepository extends BaseRepository implements TopicRepositoryInterface
{
  public function __construct(Topic $model) {
    parent::__construct($model);
  }

}