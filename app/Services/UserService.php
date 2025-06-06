<?php
//  now here instead of calling all the function here only we can pass that userRepointerface to the 
// base service to get access to all the common method.
namespace App\Services;

use App\Repository\Contracts\UserRepositoryInterface;
use Faker\Guesser\Name;

class UserService extends BaseServices{
    // since we inherited the base service all the 
    // public method are to accessed by the UserService

    //  $userRepository

    public function __construct(UserRepositoryInterface $userRepository) {
        // but here we are passing the user repo interface
        // so that only the interface defined method can be called
        // or used.
        parent::__construct($userRepository);

        // $this->userRepository = $userRepository;
    }
    // if we need to  implement additional method of the UserRepoInterface 
    // we do here not in the baseservice.


    // public function create(DTO){
  
      // AJA 15 GATE HO 
        // QuitATIONrepo-create()
     
        // GET LAST Q NO FROM Q REPO

        // RESUKT -- GET NEW Q GENERATE Q NO ())


        //
        //DTO,QNO = RESULT 

        // QuitATIONrepo-create()
        //
  // }

//   Publiic function getData()
//   {
// dto object;
// resukt = repo.getdatas()
// dto.fullname = resukl.firsname + result.middleName + result.lastname

//   }

 
    
  
  
    
    
    // public function verifiedUsers() {
    //     return $this->userRepository->getVerifiedUsers();
    // }
}
