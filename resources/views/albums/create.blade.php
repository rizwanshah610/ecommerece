@extends('layouts.app')
@section('content')
{{--{!! Form::open(['action' => 'AlbumsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}--}}
{{--{{Form::text('name','',['placeholder'=>'Album Name'])}}--}}
{{--{{Form::text('discription','',['placeholder'=>'Album Description'])}}--}}
{{--{{Form::file('cover_image')}}--}}
{{--{{Form::submit('submit')}}--}}
{{--{!! Form::close() !!}--}}
<div class="container">
    <h3>Create Album</h3>
    <form action={{url('album/store')}} method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Album Name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="5"></textarea>
        </div>
        <div class="custom-file">
            <label class="custom-file-label" for="choosefile">Choose file...</label>
            <input name="cover_image" type="file" class="custom-file-input" id="chossefile" required>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>
@endsection