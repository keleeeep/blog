@extends('main')
@section('title')
@section('content')

    <div class="header-cover">
        <h1 class="small-screen">Himpunan Mahasiswa <br>Teknik Informatika <br> Universitas Gunadarma</h1>
        <img src="/logo/logohimti.jpg" style="height: 180px" class="hidden-logo">
    </div>

    <div class="row">
        <div class="col-md-9">
            @foreach ($posts as $post)
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
                        <a href="{{route('categories.show',$category->id)}}" style="padding-left:10px;padding-right:0;" class="background background-anchor list-group-item list-group-item-action">{{$category->name}}</a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
