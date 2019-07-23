<?php

namespace App\Http\Controllers;

use App\Mail\SendMailable;
use App\Product;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function mail(){
        $data = array('name'=>'Your ordered is delivered');
        Mail::send('emails.name',$data,function ($message){
            $message->to(Auth::user()->email)
                ->subject('Test email send or not')
                ->from('rizwanshah610@gmail.com');
        });
        echo 'message sent';
    }
}
