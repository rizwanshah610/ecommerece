<?php

namespace App\Http\Controllers;

use App\Category;
//namespace App\helper;
use function Composer\Autoload\includeFile;use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create slug of name
        $slug_title = str_slug($request->name,'-');
        //Store data in database
        $category = new Category();
        $category->title = $request->input('name');
        $category->slug = $slug_title;
        $category->save();
        return back()->with('message','Category added successfully');



//        $request->validate([
//            'title'=>'required|minlength:5',
//            'description'=>'required|minlength:5',
//
//        ]);

//        $categories = Category::create($request->only('title','description'));
//        $category = new Category();
//        $category->title = $request->input('title');
//        $category->description = $request->input('description');
//        $category->parent_id = Input::get('parent_id');
//        $category->save();
////        $category->parents()->attach($request->id,$request->parent_id,['created_at'=>now(), 'updated_at'=>now()]);
//        redirect('/admin')->with('message','Category enters successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $products = Category::find($id)->products;
        $categories = Category::all();
        return view('admin.categories.index',compact('categories','products'));

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
    }
}
