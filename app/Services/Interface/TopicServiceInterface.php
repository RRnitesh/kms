<?php

namespace App\Services\Interface;

use App\DTO\TopicDTO\TopicDTO;



// implement all methods defined in baseserviceinterface
interface TopicServiceInterface extends BaseServiceInterface
{
  public function getActiveTopics();

  public function createWithAutoSort( TopicDTO $topicDTO);
}