<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'address' => 'admin address',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);
    }
}
