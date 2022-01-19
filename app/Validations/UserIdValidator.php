<?php

namespace App\Validations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Class CreateUserValidator
 * @package App\Validations
 */
class UserIdValidator
{
    /**
     * @param int $userId
     * @throws ValidationException
     */
    public function validate(int $userId)
    {
        $user = Db::table('users')->find($userId);

        if (!$user) {
            throw ValidationException::withMessages(['id' => 'User ID does not exist']);
        }
    }
}
