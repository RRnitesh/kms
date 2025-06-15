<?php


namespace App\Services\Implementation;

use App\DTO\SubTopicDTO\SubTopicDTO;
use App\Repository\Interface\SubTopicRepositoryInterface;
use App\Services\Interface\SubTopicServiceInterface;

class SubTopicService extends BaseService implements SubTopicServiceInterface
{
  protected $subRepo;
  public function __construct(SubTopicRepositoryInterface $subRepo) {
    $this->subRepo = $subRepo;
    parent::__construct($subRepo);
  }


}
