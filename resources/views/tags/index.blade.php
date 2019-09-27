@extends('main')

@section('title',"| Tags")

@section('content')

    <div class="row">

        <div class="col-md-8">
            <div class="card card-shadow p-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nama Label</th>
                        <th colspan=2 class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td class="formated-text">{{$tag->name}}</td>
                            <td width="100" class="text-center">
                                <a href="{{route('tags.edit',$tag->id)}}" class="w-80 btn btn-outline-primary btn-sm">Sunting</a>
                            </td>
                            <td width="100" class="text-center">{{Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE'])}}
                                {{Form::submit('Hapus',['class'=>'formated-text w-80 btn btn-outline-danger btn-sm'])}}
                                {{Form::close()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="col-md-4">
            <div class="card bg-gray-active card-shadow">
                <div class="card-body">
                    {!! Form::open(['route'=>'tags.store']) !!}

                    <h2>Buat Label Baru</h2>
                    {{Form::label('name','Nama')}}
                    {{Form::text('name',null,['class'=>'form-control mb-3'])}}
                    {{Form::submit('Simpan',['class'=>'btn btn-primary btn-block'])}}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>
@endsection

