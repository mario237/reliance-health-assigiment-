<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Services\Api\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function registerUser(RegisterUserRequest $registerUserRequest): JsonResponse
    {
        return AuthService::register($registerUserRequest->validated());

    }

    public function loginUser(LoginUserRequest $loginUserRequest): JsonResponse
    {
        return AuthService::login($loginUserRequest->validated());
    }
}
