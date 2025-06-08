<?php
//  now here instead of calling all the function here only we can pass that userRepointerface to the 
// base service to get access to all the common method.
namespace App\Services\Implementation;

use App\Constant\Upload;
use App\DTO\UserDTO\UserResponseDTO;
use App\DTO\UserDTO\UserSaveDTO;
use App\Repository\Interface\UserRepositoryInterface;
use Faker\Guesser\Name;

use App\Services\Implementation\BaseService;
use App\Services\Interface\UserServiceInterface;
use Illuminate\Http\UploadedFile;
use Symfony\Component\CssSelector\Node\FunctionNode;

class UserService extends BaseService implements UserServiceInterface{
    // since we inherited the base service all the 
    // public method are to accessed by the UserService
    //  $userRepository
    protected UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository) {
        // but here we are passing the user repo interface
        // so that only the interface defined method can be called
        // or used.
        // parent::__construct($userRepository);
        parent::__construct($userRepository);
        $this->userRepository = $userRepository;

        // $this->userRepository = $userRepository;
    }
    // if we need to  implement additional method of the UserRepoInterface 
    // we do here not in the baseservice.

    // here we are overriding the baseservice method 
    public function find($id){
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
    public function paginate(? int $perPage = null)
    {
        $perPage = config('pagination.users');
        $paginator = parent::paginate($perPage);
        // return $users ? UserResponseDTO::fromCollection($users) : null;

            // Use through() to transform each item to a DTO, but keep paginator object
    return $paginator->through(fn($user) => UserResponseDTO::fromModel($user));
    }
    

    
        public function createUserWithImage(UserSaveDTO $dto, ?UploadedFile $file = null)
    {
        if ($file) {
            $path = $file->store(Upload::USER_PROFILE_PATH, 'public');
            $dto->profile_image = $path;
        }

        return $this->userRepository->createUserWithImage($dto->toArray());
    }
}
