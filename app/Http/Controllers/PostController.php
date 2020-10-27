<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('id','DESC')->where('is_published','1')->get();
        return view('Admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        return view('Admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' => 'required',
            'details' => 'required'
        ],[
            'title.required' => 'Please fill in the Post title',
            'details.required' => 'please fill in post details'
        ]);

        $post = new Post;
        $post->thumbnail = $request->thumbnail;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->is_published = '1';
        $post->details = $request->details;
        $post->post_type = $request->post_type;
        $post->save();
        
        Session::flash('message','Post Created successfully');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('admin.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $this->validate($request,[
            'title' => 'required',
            'details' => 'required'
        ],[
            'title.required' => 'Please fill in the Post title',
            'details.required' => 'please fill in post details'
        ]);

        $post->thumbnail = $request->thumbnail;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->is_published = '1';
        $post->details = $request->details;
        $post->post_type = $request->post_type;
        $post->save();
        
        Session::flash('message','Post Updated successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        Session::flash('message','Post Deleted successfully');
        return redirect()->route('post.index');
    }
}
