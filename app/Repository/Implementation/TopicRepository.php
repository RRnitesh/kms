<?php

namespace App\Repository\Implementation;

use App\Models\Topic;
use App\Repository\Interface\TopicRepositoryInterface;
use Illuminate\Support\Facades\Log;



class TopicRepository extends BaseRepository implements TopicRepositoryInterface
{
  protected $model;
  // we are injecting Topic model to the Base Repo contstructor
  public function __construct(Topic $model) {

    parent::__construct($model);

    $this->model = $model;
    
  }

  public function getActiveTopics()
  {
    return $this->model->where('status', true)->get();
  }

  public function getMaxSortOrder()
  {
    return $this->model->max('sort_order');
  }
}