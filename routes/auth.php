<?php
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'] , static function (){
    Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'registerUser']);
    Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'loginUser']);
});

Route::group(['middleware' => 'auth:sanctum'] , function (){
   Route::get('me' , static function (\Illuminate\Http\Request $request){
       return $request->user();
   });
});
