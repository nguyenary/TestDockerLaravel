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
    public function show(int $userId): ?array;

    /**
     * @param int $userId
     * @param CreateUserDTO $userData
     * @return array
     */
    public function update(int $userId, CreateUserDTO $userData): array;

    /**
     * @param int $userId
     * @return array
     */
    public function delete(int $userId): array;
}
