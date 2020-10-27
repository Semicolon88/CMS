<?php

namespace Database\Seeders;
use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
           [
            'name' => 'Habeeb',
            'email' => 'example@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('1234'),
            'remember_token' => bcrypt('123456')
           ],
           [
            'name' => 'Abiola',
            'email' => 'example1@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('1234'),
            'remember_token' => bcrypt('123456')
           ],
           [
            'name' => 'Ajani',
            'email' => 'example2@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('1234'),
            'remember_token' => bcrypt('123456')
           ]
        ]);
    }
}
