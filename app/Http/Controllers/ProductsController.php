<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id');
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request,[
           'title' => 'required',
           'description' => 'required',
           'size' => 'required',
           'category_id' => 'required',
           'image' => 'image|mimes:png,jpeg,jpg|max:10000',
            'price' =>'required',
        ]);

     // Image Upload
        $formInput = $request->except('image');
         $image = $request->image;
         if ($image){
             //Image original name
             $imageName = $image->getClientOriginalName();
             //Image move to images directory in public folder
             $image->move('images',$imageName);
             //Image array
             $formInput['image'] = $imageName;
         }

         //Store data

        Product::create($formInput);
         return redirect('/admin/product/create')->with('message','Product added successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $products = Product::find($id)->category()->pluck('title');
        dd($products);
        return view('admin.products.index',compact('products'));
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
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/products')->with('message','Product deleted successfully');
    }
}
