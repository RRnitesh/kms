<?php
// this is the base service -> other service will inject their interface and this has to work on that
// table 
namespace App\Services\Implementation;

use App\Repository\Interface\BaseRepositoryInterface;
use App\Constant\Upload;

use App\Models\Trash;



use Illuminate\Support\Facades\Storage;


class BaseService implements BaseRepositoryInterface{

    protected BaseRepositoryInterface $repository;
  // here baseservice can only work on those method that is defined by
  // by the interface ; as long as UserRepo implements the
  // inside the hood we are getting the userrepointerface but we reference to the 
  // baserepinterface only meaning we cannot access method other then the 
  // baseinterface itself;

    public function __construct(BaseRepositoryInterface $repository) {
      $this->repository = $repository;
    }

    public function getModel(){
      return $this->repository->getModel();    
    }

    public function all(){
      return $this->repository->all();
    }
    public function paginate(? int $perPage = null)
    {
      return $this->repository->paginate($perPage);
    }

    public function find($id){
      return $this->repository->find($id);
    }

    public function create($data) {
      $dataArray = $this->convertToArray($data);
      // dd($data);
      return $this->repository->create($dataArray);
    }


    public function delete($id){
      return $this->repository->delete($id);
    }

    public function update($id,array $data){
      //if file and id exist
      //$this->find($id)->profile_image
      return $this->repository->update($id, $data);
    }

    protected function convertToArray($data){
      if(is_object($data) && method_exists($data, 'toArray')){
        return $data->toArray();
      }
      return (array) $data;
    }
    
    public function moveToTrash($id, $oldProfilePath)
    {
        
       $trashDir = Upload::TRASH_FOLDER ;    
       
        $filename = pathinfo($oldProfilePath, PATHINFO_BASENAME);
        $newPath = "{$trashDir}/{$filename}" ;

        $oldProfilePath = Upload::USER_PROFILE_PATH . "/{$oldProfilePath}";

        // dd($oldProfilePath, $newPath);

        Storage::disk('public')->move($oldProfilePath, $newPath);

        Trash::create([
            'user_id' => $id,
            'old_path' => $oldProfilePath,
            'trashed_path' => $newPath,
        ]);
        

    }
    
} 