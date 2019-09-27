@extends('main')

@section('title','| Show Post')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-md-8">
            <h1>Tag {{$tag->name}}
            </h1>
        </div>
    </div>

    @foreach($tag->posts as $post)
        <div class="card card-shadow mb-5">
            <img src="{{asset('images/'.$post->image)}}" class="card-img-top" alt="image">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ substr(strip_tags($post->body),0,250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>
                <p class="card-text"><small class="text-muted">Published: {{ date('M j, Y', strtotime($post->created_at)) }}</small></p>
                <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Baca Selengkapnya</a>
            </div>
        </div>
    @endforeach
@endsection
