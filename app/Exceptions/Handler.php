<?php

namespace App\Exceptions;

use App\Http\Traits\HandleApiResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;


class Handler extends ExceptionHandler
{

    use HandleApiResponse;

    public function render($request, Throwable $e): Response|JsonResponse|ResponseAlias
    {
        if ($request->is('api/*')){

            if ($e instanceof AuthenticationException){
                return self::errorResponse($e->getMessage() , ResponseAlias::HTTP_UNAUTHORIZED);

            }

            if ($e instanceof NotFoundHttpException) {
                return self::errorResponse('The page you have requested is not found' , $e->getStatusCode());
            }

            if ($e instanceof HttpException){
                return self::errorResponse($e->getMessage() , $e->getStatusCode());
            }

            if ($e instanceof ModelNotFoundException) {
                $model = strtolower(class_basename($e->getModel()));
                return self::errorResponse("Does not exist any instance of $model with the given id", ResponseAlias::HTTP_NOT_FOUND);
            }

            if ($e instanceof ValidationException) {

                $errors = $e->validator->errors()->messages();

                return self::validationErrorResponse($errors, ResponseAlias::HTTP_UNPROCESSABLE_ENTITY);
            }

            return self::errorResponse($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }

        return parent::render($request , $e);
    }
}
