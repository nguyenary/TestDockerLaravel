<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class Users extends Controller
{
    private const GENDERS = ['none', 'male', 'female'];

    /**
     * @param Request $request
     * @return array|Application|ResponseFactory|\Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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

        $column = array_keys($rules);
        $params = array_combine($column, array_map(fn ($column) => $request->get($column), $column));

        $user_id = DB::table('users')->insertGetId($params);

        return array_merge(['id' => $user_id], $params);
    }

    /**
     * @param int $id
     * @return Application|ResponseFactory|Builder|\Illuminate\Http\Response|mixed
     */
    public function get(int $id)
    {
        $user = Db::table('users')->find($id);

        if (!$user) {
            return response(['message' => 'User does not exist'], Response::HTTP_BAD_REQUEST);
        }

        return $user;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Application|ResponseFactory|Builder|\Illuminate\Http\Response|mixed
     */
    public function update(Request $request, int $id)
    {
        $rules = [
            'first_name' => 'max:20',
            'last_name' => 'max:20',
            'phone' => 'min:10|max:11',
            'address' => 'max:255',
            'gender' => 'in:' . implode(',', static::GENDERS),
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return response(['errors' => $validation->errors()], Response::HTTP_BAD_REQUEST);
        }

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

        $params = array_combine($array_keys, array_map(fn ($column) => $request->get($column), $array_keys));

        DB::table('users')->where('id', '=', $id)->update($params);

        return Db::table('users')->find($id);
    }


    /**
     * @param int $id
     * @return Application|ResponseFactory|Builder|\Illuminate\Http\Response|mixed
     */
    public function delete(int $id)
    {
        $user = Db::table('users')->find($id);

        if (!$user) {
            return response(['message' => "User does not exist"], Response::HTTP_NOT_FOUND);
        }

        DB::table('users')->delete($id);

        return $user;
    }
}
