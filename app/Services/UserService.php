<?php

namespace App\Services;

use App\DTOs\CreateUserDTO;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    /**
     * @param CreateUserDTO $userData
     * @return array
     */
    public function create(CreateUserDTO $userData): array
    {
        //TODO create user

        return [];
    }

    //TODO implementation
}