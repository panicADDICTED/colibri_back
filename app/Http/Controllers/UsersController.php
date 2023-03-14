<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('visible', 1)->get();
        return response($users, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->sex = $request->sex;
        $user->age = $request->age;
        $user->license_number = $request->license_number;
        if($request->role_id == 3){
        $user->vehicle_id = $request->vehicle_id;
        }
        $user->save();
        if($user->vehicle)
        return response($user , 200);
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        return response($user, 200);
    }

    public function showWorker($id)
    {
        $user = User::find($id);
       $user->vehicle;
        return response($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;        
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->sex = $request->sex;
        $user->age = $request->age;
        $user->license_number = $request->license_number;
        if($request->role_id == 3){
        $user->vehicle_id = $request->vehicle_id;
    }
        $user->save();
        if($user->vehicle)
        return response($user , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        $user->delete();
        return response('user delete succesfully', 200);
    }
    public function deleteUser($id, Request $request)
    {
        $user = User::find($id);
        
        $user->visible = $request->visible;
        $user->save();
        return response($user,  200);
    }
}
