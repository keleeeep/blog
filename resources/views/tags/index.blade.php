@extends('main')

@section('title',"| Tags")

@section('content')

    <div class="row">

        <div class="col-md-8">
            <h1>Tag</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td><a href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="card bg-gray-active">
                <div class="card-body">
                    {!! Form::open(['route'=>'tags.store']) !!}

                    <h2>New Tag</h2>
                    {{Form::label('name','Name:')}}
                    {{Form::text('name',null,['class'=>'form-control mb-3'])}}
                    {{Form::submit('Create New Tag',['class'=>'btn btn-primary btn-block'])}}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>



@endsection
