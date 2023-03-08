<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=> 'admin',
            'description'=> 'administrador'
    ]);
        Role::create([
            'name'=> 'client',
            'description'=> 'cliente'
    ]);
    Role::create([
        'name'=> 'provider',
        'description'=> 'contratista'
]);
    }
}
