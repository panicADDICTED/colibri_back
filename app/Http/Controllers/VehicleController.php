<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::where('visible', 1)->get();
        return response($vehicles, 200);
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
        $vehicle = new Vehicle();
        $vehicle->mark = $request->mark;
        $vehicle->capacity = $request->capacity;
        $vehicle->color = $request->color;
        $vehicle->plates = $request->plates;
        $vehicle->save();
        return response($vehicle, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return response($vehicle, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->mark = $request->mark;
        $vehicle->capacity = $request->capacity;
        $vehicle->color = $request->color;
        $vehicle->plates = $request->plates;
        $vehicle->status = $request->status;
        $vehicle->save();
        return response($vehicle, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return response($vehicle, 200);
    }

    public function deleteVehicle($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->visible = 0;
        return response($vehicle, 200);
    }
}
