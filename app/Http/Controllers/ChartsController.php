<?php

namespace App\Http\Controllers;

use App\Models\Freight;
use App\Models\User;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    //

    public function UsersType(){
        $user_store =User::where('role_id', 4)->count();
        $conductors =User::where('role_id', 3)->count();
        $clients =User::where('role_id', 2)->count();
        $administrator =User::where('role_id', 1)->count();
       
        $total = User::all()->count();

        return response()->json([
            'user_store' => $user_store,
            'conductors' => $conductors,
            'clients' => $clients,
            'administrator' => $administrator,
            'total' => $total
    
      ], 200);

    }

    public function FreightsUsers(){
        $freights = Freight::with('client')->get();
        $user_store_clients =$freights->where('client.role_id', 1)->count();
        $clients_normal =$freights->where('client.role_id', 2)->count();
       
        $total = Freight::with('client')->get()->count();

        return response()->json([
            'user_store_clients' => $user_store_clients,
            'clients_normal' => $clients_normal,
            'total' => $total
    
      ], 200);

    }

    public function freightsTotalAdmin(){
        $sunday = Freight::where('created_at', 'like', '%2023-03-19%')->sum('price');
        $monday = Freight::where('created_at', 'like', '%2023-03-20%')->sum('price');
        $tuesday = Freight::where('created_at', 'like', '%2023-03-21%')->sum('price');
        $wednesday = Freight::where('created_at', 'like', '%2023-03-22%')->sum('price');
        $thursday = Freight::where('created_at', 'like', '%2023-03-23%')->sum('price');
        $friday = Freight::where('created_at', 'like', '%2023-03-24%')->sum('price');
        $saturday = Freight::where('created_at', 'like', '%2023-03-25%')->sum('price');
        $total = Freight::sum('price');
        $sunday_profit = Freight::where('created_at', 'like', '%2023-03-19%')->sum('comision');
        $monday_profit = Freight::where('created_at', 'like', '%2023-03-20%')->sum('comision');
        $tuesday_profit = Freight::where('created_at', 'like', '%2023-03-21%')->sum('comision');
        $wednesday_profit = Freight::where('created_at', 'like', '%2023-03-22%')->sum('comision');
        $thursday_profit = Freight::where('created_at', 'like', '%2023-03-23%')->sum('comision');
        $friday_profit = Freight::where('created_at', 'like', '%2023-03-24%')->sum('comision');
        $saturday_profit = Freight::where('created_at', 'like', '%2023-03-25%')->sum('comision');
        $total_profit = Freight::sum('comision');

        return response()->json([
            'sunday' => $sunday,
            'monday' => $monday,
            'tuesday' => $tuesday,
            'wednesday' => $wednesday,
            'thursday' => $thursday,
            'friday' => $friday,
            'saturday' => $saturday,
            'total' => $total,
            'sunday_profit' => $sunday_profit,
            'monday_profit' => $monday_profit,
            'tuesday_profit' => $tuesday_profit,
            'wednesday_profit' => $wednesday_profit,
            'thursday_profit' => $thursday_profit,
            'friday_profit' => $friday_profit,
            'saturday_profit' => $saturday_profit,
            'total_profit' => $total_profit
    
      ], 200);

    }

    public function freightsTotalComision(){
        $monday = Freight::where('created_at', 'like', '%2023-03-20%')->sum('comision');
        $tuesday = Freight::where('created_at', 'like', '%2023-03-21%')->sum('comision');
        $wednesday = Freight::where('created_at', 'like', '%2023-03-22%')->sum('comision');
        $thursday = Freight::where('created_at', 'like', '%2023-03-23%')->sum('comision');
        $friday = Freight::where('created_at', 'like', '%2023-03-24%')->sum('comision');
        $total = Freight::sum('comision');

        return response()->json([
            'monday' => $monday,
            'tuesday' => $tuesday,
            'wednesday' => $wednesday,
            'thursday' => $thursday,
            'friday' => $friday,
            'total' => $total
    
      ], 200);

    }

    public function freightsProfitConductor($id){
        $freights = Freight::where('vehicle_id', $id);
        $monday =  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-20%')->sum('price') -  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-20%')->sum('comision');
        $tuesday =  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-21%')->sum('price') -  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-21%')->sum('comision');
        $wednesday =  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-22%')->sum('price') -  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-22%')->sum('comision');
        $thursday =  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-23%')->sum('price') -  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-23%')->sum('comision');
        $friday =  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-24%')->sum('price') -  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-24%')->sum('comision');
        $total = $freights->sum('price')- $freights->sum('comision');

        return response()->json([
            'monday' => $monday,
            'tuesday' => $tuesday,
            'wednesday' => $wednesday,
            'thursday' => $thursday,
            'friday' => $friday,
            'total' => $total
    
      ], 200);

    }

    public function freightsConductor($id){
        $freights = Freight::where('vehicle_id', $id);
        $monday =  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-20%')->count();
        $tuesday =  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-21%')->count();
        $wednesday =  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-22%')->count();
        $thursday =  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-23%')->count();
        $friday =  Freight::where('vehicle_id', $id)->where('created_at', 'like', '%2023-03-24%')->count();
        $total = $freights->count();

        return response()->json([
            'monday' => $monday,
            'tuesday' => $tuesday,
            'wednesday' => $wednesday,
            'thursday' => $thursday,
            'friday' => $friday,
            'total' => $total
    
      ], 200);

    }

    public function freightsClient($id){
        
        $count_freights =  Freight::where('client_id', $id)->count();
        $freights_money =  Freight::where('client_id', $id)->sum('price');
       

        return response()->json([
            'count_freights' => $count_freights,
            'freights_money' => $freights_money
    
      ], 200);

    }

    public function ProfitFreightsConductor($id){
        
        $count_freights =  Freight::where('vehicle_id', $id)->count();
        $total_profit =  Freight::where('vehicle_id', $id)->sum('price') -  $total_profit =  Freight::where('vehicle_id', $id)->sum('comision');
       

        return response()->json([
            'count_freights' => $count_freights,
            'total_profit' => $total_profit
    
      ], 200);

    }
}
