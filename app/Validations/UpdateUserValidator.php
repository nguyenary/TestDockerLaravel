<?php

namespace App\Validations;

use App\Common\Constants\UserConstant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Class CreateUserValidator
 * @package App\Validations
 */
class UpdateUserValidator
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first_name' => 'max:20',
            'last_name' => 'max:20',
            'phone' => 'min:10|max:11',
            'email' => 'email',
            'address' => 'max:255',
            'gender' => 'in:' . implode(',', UserConstant::GENDERS),
        ];
    }

    /**
     * @param Request $request
     * @throws ValidationException
     */
    public function validate(Request $request)
    {
        $validation = Validator::make($request->all(), $this->rules());

        $validation->validate();
    }
}
