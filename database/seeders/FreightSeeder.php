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
           'quantity'=> '11',
           'price'=> 2000.00,
           'comision'=> 2000.00 * .15,
           'direction'=> 'mauricio campos 267',
           'destiny'=> 'edmundo gamez 3483',
           'status'=> 'En Revisión.',
           'observations'=> 'lleguen a las 6', 
        ]);
        Freight::create([
            'material_id'=> 1, 
            'client_id'=> 4,
            'vehicle_id'=> 1,
            'quantity'=> '11',
            'price'=> 2100.00,
            'comision'=> 2100.00 * .15,
            'direction'=> 'mauricio campos 267',
            'destiny'=> 'edmundo gamez 3483',
            'status'=> 'Finalizado',
            'observations'=> 'lleguen a las 6', 
         ]);

         Freight::create([
            'material_id'=> 4, 
            'client_id'=> 3,
            'vehicle_id'=> 1,
            'quantity'=> '6',
            'price'=> 1800.00,
            'comision'=> 1800.00 * .15,
            'direction'=> 'mauricio campos 207',
            'destiny'=> 'edmundo gamez 6532',
            'status'=> 'Finalizado',
            'observations'=> 'lleguen a las 6', 
         ]);
    
    }

    
}
