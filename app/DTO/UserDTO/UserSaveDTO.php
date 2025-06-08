<?php

// usersavedto

namespace App\DTO\UserDTO;

class UserSaveDTO{

  public string $name;
  public string $email;
  public string $password;
//   can be string or null
  public ?string $profile_image;

    public function __construct(array $data)
    {
        $this->name = $data['name'] ;
        $this->email = $data['email'] ;
        $this->password = $data['password'] ;
        $this->profile_image = $data['profile_image'] ?? null;
    }

    public function toArray(): array
    {
        return [
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => $this->password,
            'profile_image' => $this->profile_image,
        ];
    }
}