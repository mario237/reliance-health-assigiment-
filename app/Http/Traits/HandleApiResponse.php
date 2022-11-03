<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait HandleApiResponse
{
    public static function errorResponse($error , $code = 500): JsonResponse
    {
        return response()->json([
            'success' => false,
            'error' => $error ?? null,
            'code' => $code
        ],$code);
    }

    public static function validationErrorResponse($errors , $code = 422): JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => $errors ?? null,
            'code' => $code
        ],$code);
    }

    public static function successResponse($data , $message , $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data ?? null,
            'message' => $message,
            'code' => $code
        ],$code);
    }
}
