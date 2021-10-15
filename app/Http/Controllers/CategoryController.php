<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\Gate;
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
        if(Gate::allows('Admin')){
            $categorys = Category::all();
        return view('Category.list_Category',compact('categorys'));
    }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('Admin')){
        return view('Category.add_Category');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        if(Gate::allows('Admin')){

            $category = new Category();
            $category->name = $request->input('name');
            $category->save();
            return redirect()->back();
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(Gate::allows('Admin')){
        $category = Category::findOrFail($id);
        return view('Category.edit_Category',compact('category'));
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if(Gate::allows('Admin')){
        $category = Category::findOrFail($request->input('id'));
        $category->name = $request->input('name');
        $category->update();
        return redirect()->route('listCategory');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Gate::allows('Admin')){
            $category = Category::findOrFail($id);
            $post = Post::where('category_id','=',$category->id)->update(['category_id'=>'025dcc7c-ef50-4ef3-b652-9e33dee5c1f3']);
            $category->delete();
            
            return redirect()->route('listCategory');
            
        }
    }
}
