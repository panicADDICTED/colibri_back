<?php

namespace App\Http\Controllers;

use App\Models\Freight;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class FreightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $freights = Freight::where('visible', 1)->get();
        return response($freights, 200);
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

        $freight = new Freight();
        $freight->material_id = $request->material_id;
        $freight->client_id = $request->client_id;
        $freight->vehicle_id = $request->vehicle_id;
        $freight->quantity = $request->quantity;
        $freight->price = $request->price;
        $freight->comision = $request->price *.15;
        $freight->direction = $request->direction;
        $freight->destiny = $request->destiny;
        $freight->observations = $request->observations;
        $freight->status = $request->status;
        $freight->save();

        $vehicle = Vehicle::find( $freight->vehicle_id);
        $vehicle->status = 0;
        $vehicle->save();
        $freight->vehicle;
        return response($freight, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Freight  $freight
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $freight = Freight::find($id);
        $freight->vehicle;
        $freight->vehicle->conductor;
        $freight->client;
        $freight->material;
        return response($freight, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Freight  $freight
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
     * @param  \App\Models\Freight  $freight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $freight = Freight::find($id);
        $freight->material_id = $request->material_id;
        $freight->client_id = $request->client_id;
        $freight->vehicle_id = $request->vehicle_id;
        $freight->quantity = $request->quantity;
        $freight->price = $request->price;
        $freight->comision = $request->price *.15;
        $freight->direction = $request->direction;
        $freight->destiny = $request->destiny;
        $freight->observations = $request->observations;
        $freight->status = $request->status;
        $freight->save();
        return response($freight, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Freight  $freight
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $freight = Freight::find($id);
        $freight->delete();
        return response($freight, 200);
    }

    public function deleteFreight($id, Request $request)
    {
        $freight = Freight::find($id);
        $freight->visible = $request->visible;
        $freight->save();
        return response($freight, 200);
    }

    public function updateStatus($id, Request $request)
    {
        $freight = Freight::find($id);
        $freight->status = $request->status;
        $freight->save();
        if($freight->status == "Finalizado"){
            $vehicle = Vehicle::find($freight->vehicle_id);
            $vehicle->status = 1;
            $vehicle->save();
            $freight->vehicle;
        }
        return response($freight, 200);
    }


}
