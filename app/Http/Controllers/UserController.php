<?php

namespace App\Http\Controllers;

use App\DTOs\CreateUserDTO;
use App\Services\UserServiceInterface;
use App\Validations\CreateUserValidator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @param CreateUserValidator $validator
     * @param UserServiceInterface $userService
     * @return JsonResponse
     */
    public function create(
        Request $request,
        CreateUserValidator $validator,
        UserServiceInterface $userService
    ): JsonResponse
    {
        $validator->validate($request);
        $user = $userService->create(new CreateUserDTO($request->all()));

        return response()->json($user);
    }




    

    //TODO continue implement
    /**
     * GET user info
     * @param int $id
     * @return Application|ResponseFactory|Builder|\Illuminate\Http\Response|mixed
     */
    public function get(int $id)
    {

        //TODO remove this logic to UserService
        $user = Db::table('users')->find($id);

        if (!$user) {
            return response(['message' => 'User does not exist'], Response::HTTP_BAD_REQUEST);
        }

        return $user;
    }

    /**
     * Update user info
     * @param Request $request
     * @param int $id
     * @return Application|ResponseFactory|Builder|\Illuminate\Http\Response|mixed
     */
    public function update(Request $request, int $id)
    {
        // TODO remove this logic to validator
        $rules = [
            'first_name' => 'max:20',
            'last_name' => 'max:20',
            'phone' => 'min:10|max:11',
            'email' => 'email|unique:users',
            'address' => 'max:255',
            'gender' => 'in:' . implode(',', static::GENDERS),
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return response(['errors' => $validation->errors()], Response::HTTP_BAD_REQUEST);
        }

        // TODO remove this logic to UserService
        $user = Db::table('users')->find($id);

        if (!$user) {
            return response(['message' => "User does not exist"], Response::HTTP_NOT_FOUND);
        }

        $columns = array_keys($rules);

        // Validate column of data is contains of columns in DB
        $array_keys = array_keys($request->all());

        foreach ($array_keys as $column) {
            if (!in_array($column, $columns)) {
                return response(['message' => "Field $column is not valid"], Response::HTTP_BAD_REQUEST);
            }
        }

        $params = array_combine($array_keys, array_map(function ($column) use ($request) {
            return $request->get($column);
        }, $array_keys));

        DB::table('users')->where('id', '=', $id)->update($params);

        return Db::table('users')->find($id);
    }


    /**
     * Delete user by id
     * @param int $id
     * @return Application|ResponseFactory|Builder|\Illuminate\Http\Response|mixed
     */
    public function delete(int $id)
    {
        //TODO same with above
        $user = Db::table('users')->find($id);

        if (!$user) {
            return response(['message' => "User does not exist"], Response::HTTP_NOT_FOUND);
        }

        DB::table('users')->delete($id);

        return $user;
    }
}
