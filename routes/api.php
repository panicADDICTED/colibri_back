<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\FreightController;
use App\Http\Controllers\MaterialController;
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
Route::get('/all_clients', [UsersController::class, 'showClients']);
Route::get('/login-movil/{email}/{password}', [AuthController::class, 'loginMovil']);
Route::post('/user/update/{id}', [UsersController::class, 'update']);
Route::put('/user/delete/{id}', [UsersController::class, 'deleteUser']); 
Route::get('/show-worker/{id}', [UsersController::class, 'showWorker']);
Route::get('/show-client/{id}', [UsersController::class, 'showClient']);
Route::post('/register-user-store', [UsersController::class, 'registerUserStore']);
Route::post('/register-user-conductor', [UsersController::class, 'registerUserConductor']);

//ROLES
Route::resource('roles', RolesController::class);

//VEHICLES
Route::resource('vehicles', VehicleController::class);
Route::put('/vehicle/delete/{id}', [VehicleController::class, 'deleteVehicle']);
Route::get('/vehicles-enabled', [VehicleController::class, 'vehiclesEnabled']);


//MATERIALS
Route::resource('materials', MaterialController::class);
Route::put('/material/delete/{id}', [MaterialController::class, 'deleteMaterial']);

//FREIGHTS
Route::resource('freights', FreightController::class);
Route::put('/freight/delete/{id}', [FreightController::class, 'deleteFreight']);
Route::put('/freight/update-status/{id}', [FreightController::class, 'updateStatus']);

Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
