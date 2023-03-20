<?php

namespace Database\Seeders;

use App\Models\Freight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FreightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Freight::create([
           'material_id'=> 1, 
           'client_id'=> 3,
           'vehicle_id'=> 1,
           'quantity'=> '133',
           'price'=> 2000.00,
           'comision'=> 2000.00 * .15,
           'direction'=> 'mauricio campos 267',
           'destiny'=> 'edmundo gamez 3483',
           'status'=> 'En Revisión.',
           'observations'=> 'lleguen a las 6', 
        ]);
    }
}
