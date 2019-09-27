@extends('main')
@section('title')
@section('content')
    {{--<div id="carouselExampleIndicators" class="carousel carousel-box-shadow slide mb-5" data-ride="carousel">--}}
        {{--<ol class="carousel-indicators">--}}
            {{--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
            {{--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
            {{--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
        {{--</ol>--}}
        {{--<div class="carousel-inner">--}}

            {{--@foreach($post as $index => $post)--}}
            {{--<div class="carousel-item @if($index == 0) {{ 'active' }} @endif">--}}
                {{--<div class=" min-vh-10">--}}
                    {{--<a href="{{ route('blog.single', $post->slug) }}">--}}
                    {{--<img class="d-block w-100" src="{{asset('images/'.$post->image)}}" alt="Second slide">--}}
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h5 class="title-shadow">{{$post->title}}</h5>--}}
                    {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}

        {{--</div>--}}
        {{--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
            {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
            {{--<span class="sr-only">Previous</span>--}}
        {{--</a>--}}
        {{--<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
            {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
            {{--<span class="sr-only">Next</span>--}}
        {{--</a>--}}
    {{--</div>--}}
    <div class="header-cover">
        <h1>Himpunan Mahasiswa <br>Teknik Informatika <br> Universitas Gunadarma</h1>
        <img src="/logo/logohimti.jpg" style="height: 180px" class="hidden-sm-down">
    </div>

    <div class="row">
        <div class="col-md-9">
            @foreach ($posts as $post)
                {{--<div class="card bg-dark text-white mb-5 shadow-lg">--}}
                    {{--<div class="box">--}}
                        {{--<img src="{{asset('images/'.$post->image)}}" class="card-img image" alt="image">--}}
                        {{--<div class="card-img-overlay unseen vertical-align-middle">--}}
                            {{--<h5 class="card-title text-white">{{ $post->title }}</h5>--}}
                            {{--<hr style="border-color: white;">--}}
                            {{--<p class="card-text text-white">{{ substr(strip_tags($post->body),0,300) }} {{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>--}}
                            {{--<p class="card-text text-white">{{date('F nS, Y - g:i',strtotime($post->created_at))}}</p>--}}
                            {{--<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary mt-5 rounded-pill">Read More</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="card card-shadow p-3 mb-3">
                    <img src="{{asset('images/'.$post->image)}}" class="card-img image" alt="image">
                    <p class="card-text pt-3" style="font-size: 0.7rem;">{{date('F nS, Y - g:i',strtotime($post->created_at))}}</p>
                    <h5 class="card-title" style="font-weight:500 !important;">{{ $post->title }}</h5>
                    <p class="card-text">{{ substr(strip_tags($post->body),0,400) }} {{ strlen(strip_tags($post->body)) > 400 ? "..." : "" }}</p>
                    <a href="{{ route('blog.single', $post->slug) }}">
                    <button class="btn btn-primary" style="width: 300px">Baca Selengkapnya &nbsp &nbsp<i class="fas fa-eye"></i></button>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="col-md-3">
            <div class="p-3 card card-shadow">
                <h2 style="font-weight:500 !important;">Kategori</h2>
                <ul class="list-group list-group-flush">
                    @foreach($categories as $category)
                        <a href="{{route('categories.show',$category->id)}}" class="background background-anchor list-group-item list-group-item-action">{{$category->name}}</a>
                    @endforeach
                </ul>
            </div>

            {{--<h2>Earliest Posts</h2>--}}
            {{--<ul class="list-group list-group-flush mb-5">--}}
                {{--@foreach($oldest as $post)--}}
                    {{--<a href="{{ route('blog.single', $post->slug) }}" class="background background-anchor list-group-item list-group-item-action">{{ $post->title }}</a>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        </div>
    </div>
@endsection
