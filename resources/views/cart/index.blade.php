@extends('layouts.app')
@section('content')
    <div class="row">
        <h3>Cart Items</h3>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Size</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>

            @foreach($cartItems as $cartItem)
                <tr>
                    <td>
                        {{$cartItem->name}}
                    </td>
                    <td>{{$cartItem->price}}</td>
                    <td width="50px">
                        {!! Form::open(['url' => ['cart/update',$cartItem->rowId], 'method' => 'post']) !!}
                        <input name="qty" type="text" value="{{$cartItem->qty}}">


                    </td>
                    <td>
                        <div > {!! Form::select('size', ['small'=>'Small','medium'=>'Medium','large'=>'Large'] , $cartItem->options->has('size')?$cartItem->options->size:'' ) !!}
                        </div>

                    </td>

                    <td>
                        <input style="float: left"  type="submit" class="button success small" value="Update">
                        {!! Form::close() !!}
                        {{Form::open(['url' => ['cart/delete', $cartItem->rowId] ,'method' => 'post' ])}}
                        <input style="float: left"  type="submit" class="button alert small" value="Delete">
                        {{ Form::close() }}
                    </td>

                </tr>
            @endforeach
            <tr>
                <td></td>
                <td>
                    Tax:{{Cart::tax()}}</br>
                    Total Price:{{Cart::total()}}$</br>
                    Subtotal:{{Cart::subtotal()}}
                </td>
                <td>Items:{{Cart::count()}}</td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <a href="{{url('checkout')}}" class="button">Checkout</a>
    </div>

    @endsection
