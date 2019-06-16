@extends('main')
@section('title','| Welcome')
@section('content')
    <div id="carouselExampleIndicators" class="carousel carousel-box-shadow slide mb-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            @foreach($post as $index => $post)
            <div class="carousel-item @if($index == 0) {{ 'active' }} @endif">
                <div class=" min-vh-10">
                    <a href="{{ route('blog.single', $post->slug) }}">
                    <img class="d-block w-100" src="{{asset('images/'.$post->image)}}" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="title-shadow">{{$post->title}}</h5>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="card bg-dark text-white mb-5 shadow-lg">
                    <div class="box">
                        <img src="{{asset('images/'.$post->image)}}" class="card-img image" alt="image">
                        <div class="card-img-overlay unseen vertical-align-middle">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <hr style="border-color: white;">
                            <p class="card-text">{{ substr(strip_tags($post->body),0,300) }} {{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                            <p class="card-text">{{date('F nS, Y - g:i',strtotime($post->created_at))}}</p>
                            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary mt-5 rounded-pill">Read More</a>
                        </div>
                    </div>
                </div>

                {{--<div class="card mb-3">--}}
                    {{--<img src="{{asset('images/'.$post->image)}}" class="card-img-top" alt="...">--}}
                    {{--<div class="card-body">--}}
                        {{--<h5 class="card-title">{{ $post->title }}</h5>--}}
                        {{--<p class="card-text">{{ substr(strip_tags($post->body),0,300) }} {{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }} </p>--}}
                        {{--<p class="card-text"><small class="text-muted">{{date('F nS, Y - g:i',strtotime($post->created_at))}}</small></p>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--<div class="post">--}}
                {{--<img src="{{asset('images/'.$post->image)}}" alt="image" class="img-fluid">--}}
                {{--<h3>{{ $post->title }}</h3>--}}
                {{--<p>{{ substr(strip_tags($post->body),0,300) }} {{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }} </p>--}}
                {{--<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>--}}
            {{-- <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a> --}}
            {{--</div>--}}
            {{--<hr/>--}}
            @endforeach
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h2>Categories</h2>
            <ul class="mb-5">
                @foreach($categories as $category)
                    <li>
                        <a href="{{route('categories.show',$category->id)}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>

            <h2>Oldes Posts</h2>
            <ul>
                @foreach($oldest as $post)
                    <li>
                        <a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
