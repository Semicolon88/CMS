<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::orderBy('id','DESC')->limit(3)->get();
        $posts = Post::orderBy('id','DESC')->where('post_type','post')->limit(3)->get();
        $page = Post::orderBy('id','DESC')->where('post_type','page')->limit(3)->get();
        return view('Admin.index',compact('category','posts','page'));
    }
}
