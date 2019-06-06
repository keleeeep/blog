@extends('main')

@section('title',"| Categories")

@section('content')

    <div class="row">

        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="card bg-gray-active">
                <div class="card-body">
                {!! Form::open(['route'=>'categories.store']) !!}

                <h2>New Category</h2>
                {{Form::label('name','Name:')}}
                {{Form::text('name',null,['class'=>'form-control mb-3'])}}
                {{Form::submit('Create New Category',['class'=>'btn btn-primary btn-block'])}}

                {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>



@endsection
