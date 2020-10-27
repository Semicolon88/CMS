<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = Post::where('post_type','page')->where('is_published','1')->get();
        //$categories = $pages->where('is_published','1')->get();
        return view('Admin.pages.index',compact('pages'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.pages.create');
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
            'thumbnail' => 'required',
            'title' => 'required',
        ],[
            'thumbnail.required' => 'fill in thumbnail',
            'title.required' => 'fill in page title'
        ]);
        $page = new Post;
        $page->thumbnail = $request->thumbnail;
        $page->user_id = Auth::id();
        $page->title = $request->title;
        $page->slug = str_slug($request->title);
        $page->is_published = '1';
        $page->details = $request->details;
        $page->post_type = $request->post_type;
        $save = $page->save();
        if($save){
            Session::flash('message','Page Created successfully');
            return redirect()->route('pages.index');
        }else{
            Session::flash('message','error');
            return redirect()->route('pages.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $page = Post::where('id',$id)->where('is_published','1')->first();
        return view('Admin.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'title' => 'required',
            'details' => 'required'
        ],[
            'title.required' => 'Please fill in the Post title',
            'details.required' => 'please fill in post details'
        ]);
        $page = Post::where('id',$id)->first();
        $page->thumbnail = $request->thumbnail;
        $page->user_id = Auth::id();
        $page->title = $request->title;
        $page->slug = str_slug($request->title);
        $page->is_published = '1';
        $page->details = $request->details;
        $page->post_type = $request->post_type;
        $page->save();

        Session::flash('message','Page Updated Successfully');
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $page = Post::where('id',$id)->first();
        $page->delete();

        Session::flash('message','Page Deleted Successfully');
        return redirect()->route('pages.index');
    }
}
