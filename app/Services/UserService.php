<?php

namespace App\Services;

use App\DTOs\CreateUserDTO;
use App\DTOs\UpdateUserDTO;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

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
        $id = DB::table('users')->insertGetId($userData->toArray());

        if ($id) {
            return array_merge(['id' => $id], $userData->toArray());
        }

        return [];
    }

    /**
     * @param int $userId
     * @return array
     */
    public function show(int $userId): array
    {
        $user = Db::table('users')->find($userId);

        if (!$user) {
            return [];
        }

        return (array) $user;
    }

    /**
     * @param int $userId
     * @param UpdateUserDTO $userData
     * @return array
     */
    public function update(int $userId, UpdateUserDTO $userData): array
    {
        DB::table('users')->where('id', '=', $userId)->update($userData->toArray());

        $user = DB::table('users')->find($userId);

        return (array) $user;
    }

    /**
     * @param int $userId
     * @return array
     */
    public function delete(int $userId): array
    {
        $user = $this->show($userId);

        if (!$user) {
            return [];
        }

        Db::table('users')->delete($userId);

        return $user;
    }
}
