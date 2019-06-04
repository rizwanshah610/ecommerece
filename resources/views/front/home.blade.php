@extends('layouts.app')
@section('content')
<section class="hero text-center">
    <br/>
    <br/>
    <br/>
    <br/>
    <h2 >
        <strong>
            Hey! Welcome to MC Store
        </strong>
    </h2>
    <br>
    <a href="{{url('/shirts')}}"><button class="button large">Check out My Shirts</button></a>
</section>
<br/>
<div class="subheader text-center">
    <h2>
        MyKey&rsquo;s Latest Shirts
    </h2>
</div>

<!-- Latest SHirts -->
<div class="row">
    <div class="row">
        @forelse($shirts->chunk(12) as $chunk)
            @foreach($chunk as $shirt)
            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="{{url('cart/additems',$shirt->id)}}" class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="#">
                            <img src="{{url('images',$shirt->image)}}"/>
                        </a>
                    </div>
                    <a href="#">
                        <h3>
                            {{$shirt->title}}
                        </h3>
                    </a>
                    <h5>
                        {{$shirt->price}}
                    </h5>
                    <p>
                        {{$shirt->description}}
                    </p>
                </div>
            </div>
            @endforeach
        @empty
            <h2>No products</h2>

        @endforelse

    </div>
</div>
    @endsection
