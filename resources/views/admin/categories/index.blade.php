@extends('admin.layout.admin')
@section('content')
    <div class="navbar">
        <a class="navbar-brand" href="#">Categories</a>
        <ul class="nav navbar-nav">
                @if(!empty($categories))
                    @forelse($categories as $cat)
                        <li>
                            <a href="{{url('admin/categories/show',$cat->id)}}">{{$cat->title}}</a>
                        </li>
                        @empty
                        <li>No Category</li>
                        @endforelse
                    @endif

        </ul>

        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Category</button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                {!! Form::open(['url' => 'admin/categories/store', 'method' => 'post']) !!}
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Category</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{ Form::label('name', 'Title') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>

                    {!! Form:: close() !!}


            </div>
        </div>

    </div>

    @if(!empty($products))
    <section>
        <h3>Products</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Products</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{$product->title}}</td>
            </tr>
            @empty
                <tr>
                    <td>No Data</td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </section>
    @endif

    @endsection
