<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::where('visible', 1)->get();
        return response($stores, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Store();
        $store->user_id = $request->user_id;
        $store->name = $request->name;
        $store->rfc = $request->rfc;
        $store->email = $request->store_email;
        $store->phone_local = $request->phone_local;
        $store->address = $request->address;
        $store->save();
        return response($store, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store =  Store::find($id);
        return response($store, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $store =  Store::find($id);
        $store->user_id = $request->user_id;
        $store->name = $request->name;
        $store->rfc = $request->rfc;
        $store->email = $request->store_email;
        $store->phone_local = $request->phone_local;
        $store->address = $request->address;
        $store->save();
        return response($store, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store =  Store::find($id);
        $store->delete();
        return response('delete successfuly', 200);
    }

    public function deleteStore($id, Request $request)
    {
        $store = Store::find($id);
        
        $store->visible = $request->visible;
        $store->save();
        return response($store,  200);
    }
}
