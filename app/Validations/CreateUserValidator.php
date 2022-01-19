<?php

namespace App\Validations;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

/**
 * Class CreateUserValidator
 * @package App\Validations
 */
class CreateUserValidator
{
    private const GENDERS = ['male', 'female'];

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first_name' => 'max:20',
            'last_name' => 'max:20',
            'phone' => 'min:10|max:11',
            'email' => 'email|unique:users',
            'address' => 'max:255',
            'gender' => 'in:' . implode(',', static::GENDERS),
        ];
    }

    /**
     * @param Request $request
     */
    public function validate(Request $request)
    {
        $validation = Validator::make($request->all(), $this->rules());
        $validation->validate();
    }
}