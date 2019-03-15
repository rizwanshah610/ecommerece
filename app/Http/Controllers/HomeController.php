<?php

namespace App\Http\Controllers;

use App\Product;
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
        $shirts = Product::all();
        return view('front.home',compact('shirts'));
    }
    public function shirts(){
        $shirts = Product::all();
        return view('front.shirts',compact('shirts'));
    }
    public function shirt(){
        return view('front.shirt');
    }
}
