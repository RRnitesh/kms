<?php

namespace App\Http\Controllers;

use App\DTO\TopicDTO\TopicDTO;
use App\Http\Requests\Topic\StoreTopicRequest;
use App\Http\Requests\Topic\UpdateTopicRequest;
use App\Services\Interface\TopicServiceInterface;


class TopicController extends Controller
{
    protected $view = 'admin.pages.topics.';
    protected TopicServiceInterface $topicService;

    public function __construct(TopicServiceInterface $topicService) {

        $this->topicService = $topicService;
    }


    public function index()
    {
        $topics = $this->topicService->getAll(); // response dto
        // dd($topics); 
        return view($this->view . 'index', ['topics' => $topics]);
    }



    public function create()
    {
        return view($this->view . 'create');
    }


    public function edit($id)
    {
        $topic = $this->topicService->getById($id);
        dd($topic);
        return view($this->view . 'edit', ['topic' => $topic]);
    }


    public function store(StoreTopicRequest $request)
    {
        $data = $request->validated();

        $topicDTO = new TopicDTO($data);
        
        $this->topicService->createWithAutoSort($topicDTO);

        return redirect()->route('topic.index')
        ->with('success', 'डेटा सफलतापूर्वक अपलोड गरियो।');
    }


    public function activetopic()
    {
        $topic = $this->topicService->getActiveTopics();

        dd($topic);
    }


    public function update(UpdateTopicRequest $request, $id)
    {
        $data = $request->validated(); // data only defined in request comes here.
        
        $this->topicService->update($id, $data);

        return redirect()->route('topic.edit', $id)->with('success', 'topic updated successfully');
    }


    public function delete($id)
    {

    }



}
