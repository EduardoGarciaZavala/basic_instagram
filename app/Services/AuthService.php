<?php

namespace App\Services;

use App\DTOs\UserDTO;
use App\Enums\AppMessages;
use App\Exceptions\CustomException;
use App\Models\User;
use App\Repositories\interface\AuthRepositoryInterface;
use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Support\Facades\Log;

class AuthService implements AuthServiceInterface
{
    public function __construct(
        private AuthRepositoryInterface $authRepositoryInterface
    ) {}

    public function register(UserDTO $userDTO): User
    {
        try {
            return $this->authRepositoryInterface->register($userDTO);
        } catch (\Throwable $th) {
            Log::error('Failed to register user', [
                'email'     => $userDTO->email,
                'exception' => $th->getMessage(),
                'trace'     => $th->getTraceAsString(),
            ]);

            throw new CustomException(
                message: __(AppMessages::REGISTER_FAILED->value),
                context: ['email' => $userDTO->email],
                previous: $th
            );
        }
    }
}
