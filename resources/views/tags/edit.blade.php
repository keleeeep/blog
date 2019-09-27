@extends('main')

@section('title',"| Edit Tag")

@section('content')
    <div class="card card-shadow p-3 m-3">
        <h1>Sunting Label</h1>
        <hr>
        {{Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'PUT'])}}

        {{Form::label('name','Nama')}}
        {{Form::text('name',null,['class'=>'form-control'])}}

        {{Form::submit('Simpan',['class'=>'btn btn-primary mt-3'])}}

        {{Form::close()}}

    </div>

@endsection
