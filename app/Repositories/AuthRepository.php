<?php

namespace App\Repositories;

use App\DTOs\UserDTO;
use App\Models\User;
use App\Repositories\interface\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{

    public function register(UserDTO $userDto): User
    {
        return User::create($userDto->toArray());
    }
}
