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
            </tr>
            </thead>

            <tbody>

            @foreach($cartItems as $cartItem)
                <tr>
                    <td>
                        {{$cartItem->name}}
                    </td>
                    <td>{{$cartItem->price}}</td>
                    <td width="1px">
                        {!! Form::open(['url' => ['cart/update',$cartItem->rowId],'method' => 'post']) !!}
                        <input name="qty" class="form-control" type="text" value = {{$cartItem->qty}}>
                        <input type="submit" class="btn btn-danger btn-sm " value="Update">
                        {!! Form::close() !!}
                    </td>
                    <td>{{$cartItem->options->has('size') ? $cartItem->options->size : ''}}</td>

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
            </tr>
            </tbody>
        </table>
        <a href="#" class="button">Checkout</a>
    </div>

    @endsection
