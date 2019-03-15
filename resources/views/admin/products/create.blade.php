@extends('admin.layout.admin')
@section('content')
    <h2>Add Product</h2>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['url' => 'admin/product/store','method' => 'post', 'files' => true]) !!}

            <div class="form-group">
                {{Form::label('title', 'Product Title', array('class' => 'awesome'))}}
                {{Form::text('title', null,array('class' => 'form-control'))}}
            </div>

            <div class="form-group">
                {{ Form::label('description','Description',array('class' => 'awesome')) }}
                {{ Form::text('description',null,array('class' => 'form-control')) }}

            </div>

            <div class="form-group">
                {{ Form::label('price','Price',array('class' => 'awesome')) }}
                {{ Form::text('price',null,array('class' => 'form-control')) }}

            </div>


            <div class="form-group">
                {{ Form::label('size','Size',array('class' => 'awesome')) }}
                {{Form::select('size',['small' => 'Small','medium' => 'Medium','large' => 'Large'],null,['class' => 'form-control','placeholder'=>'Size'])}}

            </div>


            <div class="form-group">
                {{ Form::label('category_id','Categories',array('class' => 'awesome')) }}
                {{Form::select('category_id',$categories,null,['class' => 'form-control','placeholder' => 'Select Category'])}}

            </div>

            <div class="form-group">
                {{Form::label('image','Image')}}
                {{Form::file('image',array('class'=>'form-control'))}}

            </div>

            <div class="form-group">
                {{Form::submit('Create',array('class' =>'btn btn-default'))}}

            </div>

            {!! Form::close() !!}

        </div>

    </div>
    @endsection
