<?php

namespace App\Services;

use App\DTOs\CreateUserDTO;

/**
 * Interface UserServiceInterface
 * @package App\Services
 */
interface UserServiceInterface
{
    /**
     * @param CreateUserDTO $userData
     * @return array
     */
    public function create(CreateUserDTO $userData): array;

    /**
     * @param int $userId
     * @return array
     */
    public function show(int $userId): array;

    public function update();
    public function delete();
}