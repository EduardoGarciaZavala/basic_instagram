<?php

namespace App\Repositories\interface;

use App\DTOs\UserDTO;
use App\Models\User;

interface AuthRepositoryInterface {
    public function register (UserDTO $userDTO) : User ;
}