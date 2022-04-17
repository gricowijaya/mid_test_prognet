<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admins;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Admin';

        $email = 'admin@gmail.com';        

        DB::table('admins')->insert([
            'name' => $name,
            'email' => $email,                
            'password' => Hash::make('pass'),
            'remember_token' => '12345',
        ]);
    }
}
