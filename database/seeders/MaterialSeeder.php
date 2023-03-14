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
                    'price' => 155,
               
            ]);
        Material::create(
            [
            
                    'name' => 'Arena de amarilla',
                    'price' => 150,
               
            ]);
        Material::create(
            [
            
                'name' => 'Grava 3/4',
                'price' => 300,               
            ]);
        Material::create(
            [
                'name' => 'Grava 1 1/2',
                'price' => 280,
               
            ]);
        Material::create(
            [
                'name' => 'Piedra para simiento',
                'price' => 250,
               
            ]);
        Material::create(
            [
                'name' => 'Tierra',
                'price' => 130,           
            ]);
          Material::create(
            [
                'name' => 'Tezontle',
                'price' => 310            
            ]);
          Material::create(
            [
                'name' => 'Asfalto',
                'price' => 2000,           
            ]);
                
    }
}
