<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.payment');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $cart_total = round(\Gloudemans\Shoppingcart\Facades\Cart::total());
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => $cart_total,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Payment through stripe."
        ]);


        $user=Auth::user();
        $order=$user->orders()->create([
            'total'=>$cart_total,
            'status'=>0
        ]);
        $cartItems=\Gloudemans\Shoppingcart\Facades\Cart::content();
        foreach ($cartItems as $cartItem){
            $order->orderItems()->attach($cartItem->id,[
                'qty'=>$cartItem->qty,
                'total'=>$cartItem->qty*$cartItem->price
            ]);
        }

//        return back()->with('success', 'Payment successful!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
