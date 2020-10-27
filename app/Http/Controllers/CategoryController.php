<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('id','DESC')->get();
        return view('Admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.category.create');
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
        $this->validate($request, [
            'thumbnail' => 'required',
            'name' => 'required|unique:categories'
        ],
        [
            'thumbnail.required' => 'Enter thumbnail url',
            'name.required' => 'Enter Name',
            'name.unique' => 'Categpry alredy exist'
        ]);

        $category = new Category;
        $category->thumbnail = $request->thumbnail;
        $category->user_id = Auth::id();
        $category->name = $request->name;
        $category->slug = str_slug($request->slug."kugh");
        $category->is_published = '1';
        $category->save();
        
        Session::flash('message','Category created successfully');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('Admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $this->validate($request, [
            'thumbnail' => 'required',
            'name' => 'required|unique:categories,name,'.$category->id
        ],
        [
            'thumbnail.required' => 'Enter thumbnail url',
            'name.required' => 'Enter Name',
            'name.unique' => 'Categpry alredy exist'
        ]);

        $category->thumbnail = $request->thumbnail;
        $category->user_id = Auth::id();
        $category->name = $request->name;
        $category->slug = str_slug($request->slug."kugh");
        $category->is_published = '1';
        $category->save();
        
        Session::flash('message','Category Updated successfully');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        Session::flash('delete','Category deleted');
        return redirect()->route('categories.index');
    }
}
