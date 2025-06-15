<?php

namespace App\Services\Implementation;

use App\DTO\SubTopicDTO\SubTopicDTO;
use App\DTO\TopicDTO\TopicDTO;
use App\DTO\TopicDTO\TopicResponseDTO;
use App\Repository\Interface\TopicRepositoryInterface;
use App\Services\Interface\TopicServiceInterface;

// extends base service - inherit basic curd defined in base service.
class TopicService extends BaseService implements TopicServiceInterface // anywhere topicserviceinterface comes give them this service
{
  protected TopicRepositoryInterface $topicRepo;

  // topic repo class is injected here so $topicRepo have Topic Model
  public function __construct(TopicRepositoryInterface $topicRepo) {

    parent::__construct($topicRepo);
  }
  
    public function getAll()
  {
    $topics = parent::getAll();
    
    return TopicResponseDTO::fromCollection($topics);
  }

  public function getById($id)
  {
    $topic = $this->getWithRelations($id, ['user']);
    return TopicResponseDTO::fromModel($topic);
  }

  
  public function getActiveTopics()
  {
    $topic = $this->topicRepo->getActiveTopics();

    return TopicResponseDTO::fromCollection($topic);
  }

  public function createWithAutoSort(TopicDTO $topicDTO)
  {
    $lastOrder = $this->topicRepo->getMaxSortOrder();

    $data = $topicDTO->toArray();
  
    // $data['user_id'] = auth()->id();
    $data['user_id'] = 58;
    $data['sort_order'] = $lastOrder + 1;

    return $this->topicRepo->create($data);
  }


    public function getActiveSubTopicsByTopicId($topicId) 
  {
    $topics = $this->getWithRelations($topicId, ['subtopic']);
  
    $activeSubTopics = $topics->subtopic->where('status', true);

    return SubTopicDTO::idAndNameCollection($activeSubTopics);
  }
  
}
