<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function index(){
        $categories = Category::orderBy('id','ASC')
                    ->where('is_published','1')
                        ->get();
        $posts = Post::orderBy('id','DESC')
                    ->where('post_type','post')
                            ->where('is_published','1')
                                ->get();
        return view('website.index',compact('posts','categories'));
    }
    public function post($slug){
        $post = Post::where('slug',$slug)->where('post_type','post')->first();
        if($post){
            return view('website.post',compact('post'));
        }else{
            return \Response::view('website.errors.404',array(), 404);
        }
    }

    public function category($slug){
        $cat = Category::where('slug',$slug)->where('is_published','1')->first();
        if($cat){
            $posts = $cat->posts()->orderBy('posts.id','DESC')->where('is_published','1')->paginate(3);
            return view('website.category',compact('cat','posts'));
        }else{
            return \Response::view('website.errors.404',array(), 404);
        }
    }

    public function page($slug){
        $pages = Post::where('slug',$slug)->where('is_published','1')->get();
        if($pages){
            //$posts = $cat->posts()->orderBy('posts.id','DESC')->where('is_published','1')->paginate(3);
            return view('website.page',compact('pages'));
        }else{
            return \Response::view('website.errors.404',array(), 404);
        }
    }
}
