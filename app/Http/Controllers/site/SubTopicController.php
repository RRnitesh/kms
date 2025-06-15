<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\SubTopic;
use App\Services\Interface\SubTopicServiceInterface;


class SubTopicController extends Controller
{
    protected $view = 'admin.pages.subtopic.';
    protected $subTopicService;
    public function __construct(SubTopicServiceInterface $subTopicService) {
        $this->subTopicService = $subTopicService;
    }

    public function index()
    {
        $subTopics = SubTopic::with('topic')->get();
        return view($this->view . 'index', compact('subTopics'));
    }


}
