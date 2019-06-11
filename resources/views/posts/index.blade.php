@extends('main')

@section('title','| All Posts')

@section('content')
<div class="row">
    <div class="col-md-10">
        <h1>All Posts</h1>
    </div>
    <div class="col-md-2">
    <a href="{{route('posts.create')}}" class="btn btn-primary btn-block mt-2">Create Post</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th class="align-middle"> {{$post->id}} </th>
                        <td class="align-middle"> {{$post->title}} </td>
                        <td class="align-middle"> {{ substr(strip_tags($post->body),0,50) }} {{strlen(strip_tags($post->body)) > 50 ? "..." : ""}} </td>
                        <td class="align-middle"> {{date('M j, Y',strtotime($post->created_at))}} </td>
                        <td class="align-middle"s>
                            <a href="{{route('posts.show',$post->id)}}" class="btn btn-outline-dark btn-sm">View</a>
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-outline-dark btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {!! $posts->links(); !!}
        </div>
    </div>
</div>
@endsection
