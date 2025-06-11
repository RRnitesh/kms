<?php
//  now here instead of calling all the function here only we can pass that userRepointerface to the 
// base service to get access to all the common method.
namespace App\Services\Implementation;

use App\Constant\Upload;
use App\DTO\UserDTO\UserResponseDTO;
use App\DTO\UserDTO\UserSaveDTO;
use App\Models\Trash;
use App\Repository\Interface\UserRepositoryInterface;
use Faker\Guesser\Name;

use App\Services\Implementation\BaseService;
use App\Services\Interface\FileUpLoadServiceInterface;
use App\Services\Interface\UserServiceInterface;
use Illuminate\Http\UploadedFile;
use Symfony\Component\CssSelector\Node\FunctionNode;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;

class UserService extends BaseService implements UserServiceInterface
{
    // since we inherited the base service all the 
    // public method are to accessed by the UserService
    //  $userRepository
    protected UserRepositoryInterface $userRepository;
    protected FileUpLoadServiceInterface $fileService;
    public function __construct(
        UserRepositoryInterface $userRepository,
        FileUpLoadServiceInterface $fileService
    ) {
        // but here we are passing the user repo interface
        // so that only the interface defined method can be called
        // or used.
        // parent::__construct($userRepository);
        parent::__construct($userRepository);
        $this->userRepository = $userRepository;
        $this->fileService = $fileService;

        // $this->userRepository = $userRepository;
    }
    // if we need to  implement additional method of the UserRepoInterface 
    // we do here not in the baseservice.

    // here we are overriding the baseservice method 
    public function find($id)
    {
        // doing this will call the baseservice find from where userRepoInterface 
        // works on find
        $user = parent::find($id);

        // now we override the method find of the class and
        // so that we add aditional conent on it;
        return $user ? UserResponseDTO::fromModel($user) : null;
    }

    // public function createFromDTO(UserSaveDTO $dto)
    // {
    //     return $this->userRepository->createFromDTO($dto);
    // }

    // public function all(){
    //     $users = parent::all();
    //     return $users ? UserResponseDTO::fromCollection($users) : null ;
    // }
    public function paginate(?int $perPage = null)
    {
        $perPage = config('pagination.users');
        $paginator = parent::paginate($perPage);
        // return $users ? UserResponseDTO::fromCollection($users) : null;

        // Use through() to transform each item to a DTO, but keep paginator object
        return $paginator->through(fn($user) => UserResponseDTO::fromModel($user));
    }


    // new user creation  
    public function createUserWithImage(UserSaveDTO $dto, ?UploadedFile $file = null)
    {
        if ($file) { // if user give image then
            $filename = $this->fileService->uploadFile(
                file: $file,
                path: Upload::USER_PROFILE_PATH,
                disk: 'public',
                oldFilename: null,
                ownerId: null, // we only need this for delete.
                context: 'user-profile'
            );

            $dto->profile_image = $filename;
        }

        return $this->userRepository->createUserWithImage($dto->toArray());
    }

    // update user
    public function updateUser($id, $data, ?UploadedFile $file = null)
    {
        $user = $this->userRepository->find($id);
        if ($file)  // if user have uploaded the image 
        {
            $newFilename = $this->fileService->uploadFile(
                file: $file,
                path: Upload::USER_PROFILE_PATH,
                disk: 'public',
                oldFilename: $user->profile_image,
                ownerId: $id, // may need for deletetion or check if oldfile is present. 
                context: 'user-profile',
            );
            $data['profile_image'] = $newFilename;
        }
        //hit user repo
        $this->userRepository->update($id,  $data);
    }

    public function deleteImage($id)
    {
        $user = $this->userRepository->find($id);

        if ($this->fileService->deleteAndTrash(
            filename: $user->profile_image,
            path: Upload::USER_PROFILE_PATH,
            disk: 'public',
            ownerId: $user->id,
            context: 'delete-profile-image',

        )) {
            $user->profile_image = null;

            $this->userRepository->update($user->id, [
                'profile_image' => null,
            ]);
        }

        return true;
    }

    public function downloadImage($id)
    {
        $user = $this->userRepository->find($id);
        return $this->fileService->downloadFile(
            filename: $user->profile_image,
            path: Upload::USER_PROFILE_PATH,
        );
    }
    
    public function getTrashes($userID,$dataID)
    {
        // Using the query builder:
    $trashItems = DB::table('trashes')
        ->where('user_id', $userID)
        ->where('data_id', $dataID)
        ->select('trashes.*')
        ->get();
        return $trashItems;
    }
}
