<?php

namespace App\DTO;

use App\Http\Requests\Admin\User\UserRequest;

class UserDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $password,
    ){

    }
    public static function getFromUserRequest(UserRequest $userRequest): UserDto
    {
        $data = $userRequest->validated();
        return new self(
            $data['name'],
            $data['email'],
            $data['password'] ?? null,
        );
    }
}
