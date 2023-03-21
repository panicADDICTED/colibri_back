<?php

namespace App\Http\Controllers;

use App\Models\Freight;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    //

    public function freightsTotalAdmin(){
        $monday = Freight::where('created_at', 'like', '%2023-03-20%')->sum('price');
        $tuesday = Freight::where('created_at', 'like', '%2023-03-21%')->sum('price');
        $wednesday = Freight::where('created_at', 'like', '%2023-03-22%')->sum('price');
        $thursday = Freight::where('created_at', 'like', '%2023-03-23%')->sum('price');
        $friday = Freight::where('created_at', 'like', '%2023-03-24%')->sum('price');
        $total = Freight::sum('price');

        return response()->json([
            'monday' => $monday,
            'tuesday' => $tuesday,
            'wednesday' => $wednesday,
            'thursday' => $thursday,
            'friday' => $friday,
            'total' => $total
    
      ], 200);

    }
}
