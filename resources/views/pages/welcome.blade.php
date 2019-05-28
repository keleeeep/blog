@extends('main')
@section('title','| Welcome')
@section('content')
<div class="row">
    <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
</div><!-- end row -->
<div class="row">
 <div class="col-md-8">
     @foreach ($posts as $post)
        <div class="post">
            <h3>{{ $post->title }}</h3>
            <p>{{ substr($post->body,0,10) }} {{ strlen($post->body) > 10 ? "..." : "" }} </p>
            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
            {{-- <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a> --}}
        </div>
        <hr/>
     @endforeach
     
 </div>
 <div class="col-md-3 col-md-offset-1">
     <h2>Sidebar</h2>
 </div>
</div>
@endsection