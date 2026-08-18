<?php

namespace App\Services\Interfaces;

use App\DTOs\UserDTO;
use App\Models\User;

interface AuthServiceInterface
{
    public function register(UserDTO $userDTO): User;
}
