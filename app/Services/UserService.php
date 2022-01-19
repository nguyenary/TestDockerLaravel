<?php

namespace App\Services;

use App\DTOs\CreateUserDTO;
use App\Models\User;
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
     * @return array|Builder|ValidationException|mixed
     */
    public function show(int $userId): array
    {
        $user = Db::table('users')->find($userId);

        return (array) $user;
    }

    /**
     * @param int $userId
     * @param CreateUserDTO $userData
     * @return array
     */
    public function update(int $userId, CreateUserDTO $userData): array
    {
        DB::table('users')->where('id', '=', $userId)->update($userData->toArray());

        $user = DB::table('users')->find($userId);

        return (array) $user;
    }

    /**
     * @param int $userId
     * @return array
     * @throws ValidationException
     */
    public function delete(int $userId): array
    {
        $user = $this->show($userId);

        Db::table('users')->delete($userId);

        return $user;
    }
}
