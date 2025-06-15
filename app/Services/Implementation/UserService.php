<?php
//  now here instead of calling all the function here only we can pass that userRepointerface to the 
// base service to get access to all the common method.
namespace App\Services\Implementation;

use App\Constant\Upload;
use App\DTO\UserDTO\UserResponseDTO;
use App\DTO\UserDTO\UserSaveDTO;
use App\Repository\Interface\UserRepositoryInterface;
use App\Services\Implementation\BaseService;
use App\Services\Interface\FileUpLoadServiceInterface;
use App\Services\Interface\UserServiceInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;


class UserService extends BaseService implements UserServiceInterface
{
    // since we inherit base service; we have(user service) have all method of base service
    protected UserRepositoryInterface $userRepository;
    protected FileUpLoadServiceInterface $fileService;

    public function __construct(
        UserRepositoryInterface $userRepository,
        FileUpLoadServiceInterface $fileService
    ) {
        //  pass userRepo to the Base Serivce.
        //  we have crud
        parent::__construct($userRepository);

        // storing the repo for seperate work
        $this->userRepository = $userRepository;
        $this->fileService = $fileService;

    }

    // here we are overriding the baseservice method 
    public function getAll()
    {
        $user = parent::getAll();
        return $user ? UserResponseDTO::fromModel($user) : null;
    }

    public function paginate(?int $perPage = null)
    {
        $perPage = config('pagination.users');
        $paginator = parent::getPaginated($perPage);
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
        // dd($file);
        $user = $this->userRepository->find($id);
        if ($file)  // if user have uploaded the image 
        {
            $newFilename = $this->fileService->uploadFile(
                file: $file,
                path: Upload::USER_PROFILE_PATH,
                disk: 'public',
                oldFilename: $user->profile_image_path,
                ownerId: $id, // may need for deletetion or check if oldfile is present. 
                context: 'user-profile',
            );
            $data['profile_image_path'] = $newFilename;
        }
        //hit user repo
        $this->userRepository->update($id,  $data);
    }

    public function deleteImage($id)
    {
        $user = $this->userRepository->find($id);

        if ($this->fileService->deleteAndTrash(
            filename: $user->profile_image_path,
            path: Upload::USER_PROFILE_PATH,
            disk: 'public',
            ownerId: $user->id,
            context: 'delete-profile-image',

        )) {
            $user->profile_image = null;

            $this->userRepository->update($user->id, [
                'profile_image_path' => null,
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
