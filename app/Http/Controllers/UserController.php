<?php

namespace App\Http\Controllers;

use App\DTOs\CreateUserDTO;
use App\DTOs\UpdateUserDTO;
use App\Services\UserServiceInterface;
use App\Validations\CreateUserValidator;
use App\Validations\UpdateUserValidator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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
     * @throws ValidationException
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

    /**
     * @param int $userId
     * @param UserServiceInterface $userService
     * @return JsonResponse
     */
    public function show(
        int $userId,
        UserServiceInterface $userService
    ): JsonResponse
    {
        $user = $userService->show($userId);

        return response()->json($user);
    }

    /**
     * @param Request $request
     * @param UpdateUserValidator $validator
     * @param UserServiceInterface $userService
     * @param int $userId
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(
        Request $request,
        UpdateUserValidator $validator,
        UserServiceInterface $userService,
        int $userId
    ): JsonResponse
    {
        $validator->validate($request);
        $user = $userService->update($userId, new UpdateUserDTO($request->all()));

        return response()->json($user);
    }

    /**
     * @param int $userId
     * @param UserServiceInterface $userService
     * @return JsonResponse
     */
    public function delete(
        int $userId,
        UserServiceInterface $userService
    ): JsonResponse
    {
        $user = $userService->delete($userId);

        return response()->json($user);
    }
}
