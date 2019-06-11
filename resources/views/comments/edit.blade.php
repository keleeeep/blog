@extends('main')

@section('title','| Show Post')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-3">Edit Comment</h2>

            {{Form::model($comment,['route'=>['comments.update',$comment->id],'method'=>'PUT'])}}

            {{Form::label('name','Name:')}}
            {{Form::text('name',null,['class'=>'form-control mb-3','disabled'=>''])}}

            {{Form::label('email','Email:')}}
            {{Form::text('email',null,['class'=>'form-control mb-3','disabled'=>''])}}

            {{Form::label('comment','Comment:')}}
            {{Form::textarea('comment',null,['class'=>'form-control mb-3'])}}

            {{Form::submit('Update Comment',['class'=>'btn btn-primary btn-block mt-2'])}}

            {{Form::close()}}
        </div>
    </div>

@endsection
