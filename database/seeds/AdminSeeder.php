<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checkExits = DB::table('users')->where('email', 'admin@gmail.com')->first();

        if(!blank($checkExits)){
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'role'  => 'Admin'
            ]);
        }
    }
}
