<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function shipping(){
        return view('front.shipping-profile');

    }
}
