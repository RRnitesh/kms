<?php

namespace App\DTO\UserDTO;

use App\Models\User;
use App\Constant\Upload;

class UserResponseDTO{
  // data we want to display to the user
  public int $id;
  public string $name;
  public string $email;
  public ?string $profile_image;
  public string $profile_image_url; // added property

  // $userDTO = new UserResponseDTO($user->id, $user->name, $user->email);

  // in the service we can define the dto like this but
  // in long run it becomes overcrowed say long

  // initalize the dto data 
  public function __construct(int $id,string $name,string $email,?string $profile_image = null, string $profile_image_url = '') {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->profile_image = $profile_image;
    $this->profile_image_url = $profile_image_url;
  }

  // instead of sending data we create method where are send all data 
  // at once two importance -> abstracts , readable

  // $userDTO = UserResponseDTO::fromModel($user);
  // static function works first $user have all the data not just 3
  // but all 
  // new self will create object using constructor 
  // passes the data meaning initialzing it
  public static function fromModel(User $user) : self{
    return new self( //constructor is initiliazed here say object create
      $user->id,
      $user->name,
      $user->email,
      $user->profile_image,
      $user->profile_image 
        ? asset('storage/' . Upload::USER_PROFILE_PATH . '/' . $user->profile_image)
        : asset('images/default-profile.png'),
    );
  }

  // for user all() we need to loop every row with fromModel 
  // it will convert list of user into array of user DTO 
  public static function fromCollection(iterable $users){ //users[] data
    return array_map(
      fn(User $user) => self::fromModel($user), // array map convert
      // every user into a DTO.
      //       [
      //   UserResponseDTO::fromModel($user1),
      //   UserResponseDTO::fromModel($user2),
      //   ...
      //      ]

      is_array($users) ? $users : $users->all()
      // all() built in function [it returns array from collection]
      // this will convert collection into the all method of collection
    );
  }

  // now that DTO object is object is converted to array
  public function toArray(){
    return [
      'id' => $this->id,
      'name' => $this->name,
      'email' => $this->email,
      'profile_image' => $this->profile_image,
      'profile_image_url' => $this->profile_image_url, // include in array
    ];
  }
}
