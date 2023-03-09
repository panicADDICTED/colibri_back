<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\RolesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

//USER
Route::resource('users', UsersController::class);
Route::post('/user/update/{id}', [UsersController::class, 'update']);
Route::post('/user/delete/{id}', [UsersController::class, 'destroy']);

//ROLES
Route::resource('roles', RolesController::class);

Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
