@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                </tr>
                </thead>
                <tbody>
                @foreach($albums as $photo)
                    <tr>
                        <td><img src="storage/app/public/album_covers/{{ $photo->cover_image }}"></td>
                        {{--<td>{{ $photo->filename }}</td>--}}
                        {{--<td>{{ $photo->original_name }}</td>--}}
                        {{--<td>{{ $photo->resized_name }}</td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
