<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserController extends Controller
{
  // inititate a variable for referencing to that UserServices class
  // $userService or $anything just a varibale
  protected UserService $userService;

  // inside the parameter UserServices is the class and $userService for now
  // means This object is stored in the $userService parameter at runtime.
  public function __construct(UserService $userService) {
  // we are assigning the injected object to our class 'UserController' property $anything.
  // $anything is now a reference to the same instance of UserService.

    $this->userService = $userService;

  // You can now call any public method of UserService 
  }

  // now we can call all the UserServices method by $this->userServicep;
  public function index(){
    $data['users'] = $this->userService->all();
    return view('users.index', ['data' => $data]);
  }

  // public function create(){
  //   $data['users'] = $this->userService->create(datra);
  //   return view('users.index', ['data' => $data]);
  // }

  public function show($id){
    $user = $this->userService->find($id);
    return view('users.show', compact('user'));
  }
}

