@extends('admin.layout.admin')
@section('header')
    <title>Orders</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href={{asset('table/images/icons/favicon.ico')}}/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('table/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('table/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('table/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('table/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('table/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('table/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('table/css/main.css')}}">
    <!--===============================================================================================-->
@endsection
@section('content')
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver1 m-b-110">

                    <table data-vertable="ver1">

                        <thead>
                        <tr class="row100 head">
                            <th class="column100 column1" data-column="column1"><h2>Orders</h2></th>
                            <th class="column100 column2" data-column="column2">Order Nubmer</th>
                            <th class="column100 column3" data-column="column3">Product Name</th>
                            <th class="column100 column4" data-column="column4">Quantity</th>
                            <th class="column100 column5" data-column="column5">Total</th>
                            <th class="column100 column6" data-column="column6">Status</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($orders as $order)
                            <tr class="row100">
                                <td class="column100 column1" data-column="column1"></td>
                                <td class="column100 column2" data-column="column2">{{$order->id}}</td>
                                @foreach($order->orderItems as $item)
                                    <td class="column100 column3" data-column="column3">{{$item->title}}</td>
                                    <td class="column100 column4" data-column="column4">{{$item->pivot->qty}}</td>
                                @endforeach
                                <td class="column100 column5" data-column="column5">{{$order->total}}</td>
                                <td class="column100 column6" data-column="column6">{{$order->status}}</td>


                            </tr>
                        @endforeach

                        </tbody>


                    </table>

                </div>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="{{asset('table/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('table/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('table/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('table/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/main.js')}}"></script>

@endsection
