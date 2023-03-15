<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Vehicle::create([
            'mark' => 'volvo',
            'capacity' => '7',
            'color' => 'rojo',
            'plates' => 'QWE3-2334-455N',
            'policy' => '2233232444',
            'status' => 0,
         ]);
         Vehicle::create([
            'mark' => 'Dina',
            'capacity' => '14',
            'color' => 'azul',
            'plates' => 'QWE3-EGHO-4ZEG',
            'policy' => '22455788'
         ]);
    }
}
