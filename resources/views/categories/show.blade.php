@extends('main')

@section('title',"| $category->name")

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-md-8">
            <h1>Kategori {{$category->name}}
            </h1>
        </div>
    </div>

    <div class="row">
        @foreach($category->posts as $post)
            <div class="col-md-4">
                <div class="card card-shadow mb-5" style="height: 690px;">
                    <img src="{{asset('images/'.$post->image)}}" class="card-img-top" alt="image">
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted">Published: {{ date('M j, Y', strtotime($post->created_at)) }}</small></p>
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ substr(strip_tags($post->body),0,200) }}{{ strlen(strip_tags($post->body)) > 200 ? '...' : "" }}</p>
                        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary" style="position: absolute ;bottom: 24px !important;">Baca Selengkapnya &nbsp &nbsp<i class="fas fa-eye"></i></a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

@endsection
