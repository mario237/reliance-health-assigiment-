<?php

namespace App\Http\Services\Api;

use App\Http\Resources\UserResource;
use App\Http\Traits\HandleApiResponse;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    use HandleApiResponse;

    public static function register($data): JsonResponse
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return self::successResponse(UserResource::make($user), 'User is created successfully' );
    }

    public static function login($data): JsonResponse
    {
        $user = User::where('email', $data['email'])->first();

        if (Hash::check( $data['password'] , $user->password)){
            $user['token'] = $user->createToken("API TOKEN")->plainTextToken;
            return self::successResponse(UserResource::make($user) , 'User is login successfully' );
        }

        return self::errorResponse('Credentials is not valid' , 401);
    }
}
