<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::create(
            [
            
                    'name' => 'Arena de rio',
                    'description' => 'Arena de rio',
               
            ]);
        Material::create(
            [
            
                    'name' => 'Arena de amarilla',
                    'description' => 'Arena de amarilla',
               
            ]);
        Material::create(
            [
            
                'name' => 'Grava 3/4',
                'description' => 'Grava 3/4',
               
            ]);
        Material::create(
            [
                'name' => 'Grava 1 1/2',
                'description' => 'Grava 1 1/2',
               
            ]);
        Material::create(
            [
                'name' => 'Piedra para simiento',
                'description' => 'Piedra para simiento',
               
            ]);
        Material::create(
            [
                'name' => 'Tierra',
                'description' => 'Tierra',
               
            ]);
          Material::create(
            [
                'name' => 'Tezontle',
                'description' => 'Tezontle',
               
            ]);
          Material::create(
            [
                'name' => 'Asfalto',
                'description' => 'Asfalto',
               
            ]);
                
    }
}
