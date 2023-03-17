<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'name' => 'Ferreteria Israel',
            'rfc' => '3232323RFS',
            'phone_local' => '2333443233',
            'email' => 'Ferreteria.e@gmail.com',
            'address' => 'balcones de santamaria 2233',
            'user_id' => '4',
        ]);
    }
}
