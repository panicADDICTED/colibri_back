<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Freight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User 
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'user' => $user
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function loginMovil($email){
        try {
       $user = User::where('email', $email)->first();
       $freight = Freight::where('vehicle_id', $user->vehicle_id)->whereNotIn('status', ["Finalizado"])->first();
      
       $datos = [
        '0' => $user->id,
        'id' => $user->id,
        '1' => $user->email,
        'email' => $user->email,
        '2' => $user->name,
        'name' => $user->name,
        '3' => $user->last_name,
        'last_name' => $user->last_name,
        '4' => $user->created_at,
        'created_at' => $user->created_at,
        '5' => $user->role_id,
        'role_id' => $user->role_id,
        '6' => $user->phone,
        'phone' => $user->phone,
        '7' => $user->sex,
        'sex' => $user->sex,
        '8' => $user->age,
        'age' => $user->age,
        '9' => $user->license_number,
        'license_number' => $user->license_number,
        '10' => $user->visible,
        'visible' => $user->visible,
        '11' => $user->vehicle->mark,
        'mark' => $user->vehicle->mark,
        '12' => $user->vehicle->capacity,
        'capacity' => $user->vehicle->capacity,
        '13' => $user->vehicle->color,
        'color' => $user->vehicle->color,
        '14' => $user->vehicle->plates,
        'plates' => $user->vehicle->plates,
        '15' => $user->vehicle->policy,
        'policy' => $user->vehicle->policy,
        '16' => $user->vehicle_id,
        'vehicle_id' => $user->vehicle_id,
        '17' => $freight->id,
        'freight_id' => $freight->id,
        '18' => $freight->direction,
        'direction' => $freight->direction,
        '19' => $freight->destiny,
        'destiny' => $freight->destiny,
        '20' => $freight->material->name,
        'material' => $freight->material->name,
        '21' => $freight->price,
        'price' => $freight->price,
        '22' => $freight->observations,
        'observations' => $freight->observations,
       ];
        return response()->json(['datos' => [$datos]], 200);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
    }

    public function loginMovilClient($email){
        try {
       $user = User::where('email', $email)->whereNotIn('role_id', [3])->first();
      
       $datos = [
        '0' => $user->id,
        'id' => $user->id,
        '1' => $user->email,
        'email' => $user->email,
        '2' => $user->name,
        'name' => $user->name,
        '3' => $user->last_name,
        'last_name' => $user->last_name,
        '4' => $user->created_at,
        'created_at' => $user->created_at,
        '5' => $user->phone,
        'phone' => $user->phone,
        '6' => $user->sex,
        'sex' => $user->sex,
        '7' => $user->age,
        'age' => $user->age,
        '8' => $user->visible,
        'visible' => $user->visible,
       ];
        return response()->json(['datos' => [$datos]], 200);

    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
    }
}