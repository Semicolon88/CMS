<?php

namespace App\Http\Controllers;
use Auth;
use Session;
Use Storage;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galleries = Gallery::orderBy('id','ASC')->get();
        return view('Admin.galleries.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.galleries.create');
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
            'image_url' => 'required',
        ],[
            'image_url.required' => 'Select Image'
        ]);
        foreach($request->image_url as $image){
            $name = $image->getClientOriginalName();
            $fname = pathinfo($name, PATHINFO_FILENAME);
            $ext = $image->getClientOriginalExtension();
            $path = $fname .'_'.$ext;

            $gallery = new Gallery;
            $gallery->user_id = Auth::id();
            $gallery->image_url = $path;
            $save = $gallery->save();

            if($save){
                $image->storeAs('public/galleries',$fname);
            }
        }
        Session::flash('message','Image Added To Gallery');
        return redirect()->route('galleries.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
        Storage::delete('public/galleries/'. $gallery->image_url);

        $gallery->delete();

        Session::flash('message','Image Deleted');
        return redirect()->route('galleries.index');
    }
}
