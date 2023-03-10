<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\VehicleController;

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
Route::put('/user/delete/{id}', [UsersController::class, 'deleteUser']);

//ROLES
Route::resource('roles', RolesController::class);

//VEHICLES
Route::resource('vehicles', VehicleController::class);
Route::put('/vehicle/delete/{id}', [VehicleController::class, 'deleteVehicle']);

Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
