<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('galleries')->insert([
           [
            'user_id' => '14',
            'image_url' => 'this is empty for now',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
           ],
           [
            'user_id' => '14',
            'image_url' => 'this is empty for now',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
           ],
           [
            'user_id' => '14',
            'image_url' => 'this is empty for now',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
           ],
           [
            'user_id' => '14',
            'image_url' => 'this is empty for now',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
           ]
        ]);
    }
}
