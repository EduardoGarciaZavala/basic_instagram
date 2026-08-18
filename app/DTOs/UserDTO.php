<?php

namespace App\DTOs;

use Carbon\Carbon;

class UserDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
        public readonly string $name,
        public readonly string $username,
        public readonly Carbon $birthdate,
    ) {}

    public static function fromRequest(array $request): self
    {
        $dto = new self(
            email: $request['email'],
            password: bcrypt($request['password']),
            name: $request['name'],
            username: $request['username'],
            birthdate: Carbon::parse($request['birthdate'])
        );

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
            'name' => $this->name,
            'username' => $this->username,
            'birthdate' => $this->birthdate
        ];
    }
}
