<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            [
                'user_id' => '14',
                'title' => 'first page',
                'slug' => 'first_page',
                'sub_title' => 'this is our first blog page',
                'details' => "this page was inspired by laravel v8 and the page is basically about rosource controllers in laravel",
                'post_type' => 'page',
                'is_published' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '14',
                'title' => 'second page',
                'slug' => 'second_page',
                'sub_title' => 'this is our second blog page',
                'details' => "this page was inspired by laravel v8 and the page is basically about rosource controllers in laravel",
                'post_type' => 'page',
                'is_published' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'user_id' => '14',
                'title' => 'third page',
                'slug' => 'third_page',
                'sub_title' => 'this is our third blog page',
                'details' => "this page was inspired by laravel v8 and the page is basically about rosource controllers in laravel",
                'post_type' => 'page',
                'is_published' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'user_id' => '14',
                'title' => 'fourth page',
                'slug' => 'fourth_page',
                'sub_title' => 'this is our fourth blog page',
                'details' => "this page was inspired by laravel v8 and the page is basically about rosource controllers in laravel",
                'post_type' => 'page',
                'is_published' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'user_id' => '14',
                'title' => 'fifth page',
                'slug' => 'fifth_page',
                'sub_title' => 'this is our fifth blog page',
                'details' => "this page was inspired by laravel v8 and the page is basically about rosource controllers in laravel",
                'post_type' => 'page',
                'is_published' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'user_id' => '14',
                'title' => 'sixth page',
                'slug' => 'sixth_page',
                'sub_title' => 'this is our sixth blog page',
                'details' => "this page was inspired by laravel v8 and the page is basically about rosource controllers in laravel",
                'post_type' => 'page',
                'is_published' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
