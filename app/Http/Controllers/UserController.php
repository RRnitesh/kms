<?php

namespace App\Http\Controllers;

use App\Constant\Upload;
use App\DTO\UserDTO\UserSaveDTO;
use App\Http\Requests\User\StoreUserRequest;
use App\Services\Interface\UserServiceInterface;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

  // inititate a variable for referencing to that UserServicesinterface class
  // $userService or $anything just a varibale
  // protected UserServiceInterface so that it can be accessed by child class it inherit it

  // inside the parameter UserServices is the class and $userService for now
  // means This object is stored in the $userService parameter at runtime.

  // we are assigning the injected object to our class 'UserController' property $anything.
  // $anything is now a reference to the same instance of UserService.

  // You can now call any public method of UserService 

  protected UserServiceInterface $userService;
  private $view;

  public function __construct(UserServiceInterface $userService) {
    $this->userService = $userService;
    $this->view = 'admin.pages.user.';
  }

  // now we can call all the UserServices method by $this->userServicep;
  public function index(){

    //perpage = 
    // $data['users'] = $this->userService->paginate();
    $data['users'] = $this->userService->all();
    // dd($data);
    // return view($this->view . 'index', ['data' => $data]);
    return view('admin.pages.user.index', $data);
  }

  // public function create(){
  //   $data['users'] = $this->userService->create(datra);
  //   return view('users.index', ['data' => $data]);
  // }

  public function show($id){
    $user = $this->userService->find($id);
    return view('users.show', compact('user'));
  }

  // public function create(){
  //   return view('users.create');
  // }
  public function create(){
    return view('admin.pages.user.create');
  }
  
  
  // public function store(Request $request){ // calls the rules method from here only 

  //   // $validated = $request->validate();
  //   // validate is a method from FromRequest class 

  //   // $userDTO = new UserSaveDTO($validated);
  //   $data = $request->all();

  //   $this->userService->create($data);

  //   return redirect()->route('users.index')->with('success', 'User created successfully');
  // }
  public function store(StoreUserRequest $request){
    $validated = $request->validated();

    // user saving dto 
    $userDTO = new UserSaveDTO($validated);

    $user = $this->userService->createUserWithImage($userDTO, $request->file('profile_image'));

    return redirect()->route('users.index')->with('success', 'user created successfully');

  }


  public function delete($id){

    $this->userService->delete($id);

    return redirect()->route('users.index')->with('success', 'user deleted successfully');
  }


  public function edit($id){

    $user = $this->userService->find($id);

    return view($this->view . 'edit', compact('user'));
  }
  
  public function update(Request $request, $id){

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        // Optionally add password field
    ]);

    $this->userService->update($id, $validatedData);
    
    return redirect()->route('users.edit', $id)->with('success', 'user updated successfully');
  }
  



}

