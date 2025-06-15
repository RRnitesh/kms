<?php

namespace App\Http\Controllers\site;

use App\DTO\UserDTO\UserSaveDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\Topic;
use App\Services\Interface\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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

  public function __construct(UserServiceInterface $userService)
  {
    $this->userService = $userService;
    $this->view = 'admin.pages.user.';
  }

  // now we can call all the UserServices method by $this->userServicep;
  public function index()
  {
    $data['users'] = $this->userService->getPaginated();
    return view('admin.pages.user.index', $data);
  }


  public function show($id)
  {
    $user = $this->userService->getById($id);
    return view('users.show', compact('user'));
  }


  public function create()
  {
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
  public function store(StoreUserRequest $request)
  {
    $validated = $request->validated();
    // dd($validated);
    // user saving dto 
    $userDTO = new UserSaveDTO($validated);

    $user = $this->userService->createUserWithImage($userDTO, $request->file('profile_image'));

    return redirect()->route('users.index')->with('success', 'user created successfully');
  }


  public function delete($id)
  {

    $this->userService->delete($id);

    return redirect()->route('users.index')->with('success', 'user deleted successfully');
  }


  public function edit($id)
  {
    $user = $this->userService->getById($id);

    return view($this->view . 'edit', compact('user'));
  }


  public function update(Request $request, $id)
  {

    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email,' . $id,
      //email is checked at the database here only if it will match other things

    ]);
    $file = $request->file('profile_image');
    // dd($file);

    $this->userService->updateUser($id, $validatedData, $file);

    return redirect()->route('users.edit', $id)->with('success', 'user updated successfully');
  }

  public function deleteImage($id)
  {
    $this->userService->deleteImage($id);
    return redirect()->back()->with('success', 'iamge deleted successfully');
  }

  public function downloadImage($id): BinaryFileResponse
  {
    return $this->userService->downloadImage($id);
  }

  public function getTrashDataByUserIdAndFileId(Request $request)
  {
    // Validate incoming request parameters!
    $request->validate([
      'user_id' => ['required', 'integer', 'exists:users,id'],
      'data_id' => ['required', 'integer'],
    ]);

    $userID = $request->user_id;
    $dataID = $request->data_id;

    // Using the query builder:
    $trashItems = FacadesDB::table('trashes')
      ->where('user_id', $userID)
      ->where('data_id', $dataID)
      ->select('trashes.*')
      ->get();

    dd($trashItems);
  }


  public function storeTopic(Request $request)
  {
    // Validate the request
    $request->validate([
      'img' => 'nullable|image|max:2048',
      // add more validations as needed
    ]);

    $path = null;

    // If there's an uploaded image, store it
    if ($request->hasFile('img')) {
      $file = $request->file('img');
      $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();

      // Save in: storage/app/public/attachments/topic/{topic_id}/image.jpg
      $path = $file->storeAs("attachments/topic/temp", $filename, 'public'); // temporary, we’ll move later
    }

    // Create the topic (now that we know everything)
    $topic = Topic::create([
      'img'   => $path,  // optional if image exists
      // add other fields here
    ]);

    // Optionally move the image to a folder named after the topic ID
    if ($path) {
      $newPath = "attachments/topic/{$topic->id}/" . basename($path);
      Storage::disk('public')->move($path, $newPath);
      $topic->img = $newPath;
      $topic->save();
    }

    return redirect()
      ->route('users.index')  // or your actual topic listing route
      ->with('success', 'Topic created successfully!');
  }
}
