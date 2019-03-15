@extends('layouts.app')
@section('title','Shirts')
@section('content')
    <!-- products listing -->
    <!-- Latest SHirts -->

    <div class="row">
        @forelse($shirts as $shirt)
        <div class="small-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a class="button expanded add-to-cart">
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
            @empty
            <h2>No products</h2>
        @endforelse

    </div>

    @endsection
