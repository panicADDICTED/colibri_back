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

    
    }
}
