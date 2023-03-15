<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'last_name' => 'admin',
            'phone' => '3312121122',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
            'sex' => 'Hombre',
            'age' => '22',
            'license_number' => '3223232323232323',
            'role_id' => '1',
    ]);

    User::create([
        'name' => 'Jordan',
        'last_name' => 'Tellez',
        'phone' => '3322244554',
        'email' => 'jordan@gmail.com',
        'password' => Hash::make('123'),
        'sex' => 'Hombre',
        'age' => '22',
        'vehicle_id' => 1,
        'license_number' => '2111123',
        'role_id' => '3',
]);
User::create([
    'name' => 'Rcardo',
    'last_name' => 'Gonzalez Rodriguez',
    'phone' => '2333443233',
    'email' => 'ricardo@gmail.com',
    'password' => Hash::make('123'),
    'sex' => 'Hombre',
    'age' => '22',
    'role_id' => '2',
]);

    
    }
}
