@extends('admin.layout.admin')
@section('content')
    <h2>Products</h2>
    <ul>

        @forelse($products as $product)
        <li>
            <h4>Name of Product:{{$product->title}}</h4>
            <h4>Name of Category:{{$product->category ? $product->category->title : 'N/A'}}</h4>
            <form method="POST" action="/admin/product/delete/{{$product->id}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="submit" class="btn btn-danger" value="Delete Product">
                </div>
            </form>
        </li>
            @empty
            <h2>No Products</h2>
            @endforelse
    </ul>
    @endsection
