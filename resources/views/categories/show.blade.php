@extends('main')

@section('title',"| $category->name")

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{$category->name}}
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($category->posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td><a href="{{route('blog.single', $post->slug)}}" class="btn btn-outline-secondary btn-sm">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
