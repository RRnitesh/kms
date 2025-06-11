<?php

namespace App\Services\Implementation;

use App\Repository\Interface\TopicRepositoryInterface;
use App\Services\Interface\TopicServiceInterface;

class TopicService extends BaseService implements TopicServiceInterface
{
  protected TopicRepositoryInterface $topicRepo;
  public function __construct(TopicRepositoryInterface $topicRepo) {

    parent::__construct($topicRepo);

  }
  

}