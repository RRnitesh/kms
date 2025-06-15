<?php

namespace App\Http\Controllers\Knowledge;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    
    protected $view = 'admin.pages.knowledge.';

    public function create(){
        $topics = Topic::all();
        return view($this->view . 'create', compact('topics'));
    }

    
    public function store(Request $request)
    {
        dd($request->all());
    }
}
