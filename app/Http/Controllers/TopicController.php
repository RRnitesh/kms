<?php

namespace App\Http\Controllers;

use App\DTO\TopicDTO\TopicDTO;
use App\Http\Requests\Topic\StoreTopicRequest;
use App\Models\Topic;
use App\Services\Interface\TopicServiceInterface;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TopicController extends Controller
{
    protected $view = 'admin.pages.topics.';
    protected TopicServiceInterface $topicService;

    public function __construct(TopicServiceInterface $topicService) {
        $this->topicService = $topicService;
    }

    public function index()
    {
        $topics = $this->topicService->all();
        return view($this->view . 'index', ['topics' => $topics]);
    }



    public function create()
    {
        return view($this->view . 'create');
    }


    public function edit($id)
    {
        $topic = $this->topicService->find($id);
        return view($this->view . 'edit',compact($topic));
    }


    public function store(StoreTopicRequest $request)
    {
        $data = $request->validated();

        $topicDTO = new TopicDTO($data);

        $this->topicService->create($topicDTO);

        return redirect()->route('topic.index')
        ->with('success', 'डेटा सफलतापूर्वक अपलोड गरियो।');
    }


    public function delete($id)
    {

    }


//      public function getTrashDataByUserIdAndFileId(Request $request)
// {
//     // Validate incoming request parameters!
//     $request->validate([
//         'user_id' => ['required', 'integer', 'exists:users,id'],
//         'data_id' => ['required', 'integer'],
//     ]);

//     $userID = $request->user_id;
//     $dataID = $request->data_id;

//     $trashItems = DB::table('trashes')
//         ->leftJoin('users'='users.id',trases.userid)
//         ->where('user_id', $userID)
//         ->where('data_id', $dataID)
//         ->select('trashes.old_path',users,name)
//         ->get();


//     dd($trashItems);
// }
}
