<?php

namespace App\Repository\Interface;

use Illuminate\Support\Facades\Log;


// meaning any class that implements topicRepoInterface 
// must implement all methods of baseRepoInterface
interface TopicRepositoryInterface extends BaseRepositoryInterface
{
  public function getActiveTopics();

  public function getMaxSortOrder();
}