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
            'name'=> 'store',
            'description'=> 'rol para tienda'
    ]);
        Role::create([
            'name'=> 'client',
            'description'=> 'cliente'
    ]);
    Role::create([
        'name'=> 'conductor',
        'description'=> 'contratista'
]);

Role::create([
    'name'=> 'admin',
    'description'=> 'superadmin'
]);
    }
}
