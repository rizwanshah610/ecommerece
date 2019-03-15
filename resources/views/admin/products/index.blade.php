@extends('admin.layout.admin')
@section('content')
    <h2>Products</h2>
    <ul>

        @forelse($products as $product)
        <li>
            <h4>Name of Product:{{$product->title}}</h4>
        </li>
            @empty
            <h2>No Products</h2>
            @endforelse
    </ul>
    @endsection
