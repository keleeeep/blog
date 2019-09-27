@extends('main')

@section('title',"| Blog")

@section('content')

   <div class="row mt-5 mb-5">
       <div class="col-md-10">
           <h1>Daftar Artikel</h1>
       </div>
   </div>

   <div class="row">
           @foreach($posts as $post)
           <div class="col-md-4">
           <div class="card card-shadow mb-5" style="height: 690px;">
                   <img src="{{asset('images/'.$post->image)}}" class="card-img-top" alt="image">
                   <div class="card-body">
                       <p class="card-text"><small class="text-muted">Published: {{ date('M j, Y', strtotime($post->created_at)) }}</small></p>
                       <h5 class="card-title" style="font-weight: 500 !important;">{{ $post->title }}</h5>
                       <p class="card-text">{{ substr(strip_tags($post->body),0,200) }}{{ strlen(strip_tags($post->body)) > 200 ? '...' : "" }}</p>
                       <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary" style="position: absolute ;bottom: 24px !important;">Baca Selengkapnya &nbsp &nbsp<i class="fas fa-eye"></i></a>
                   </div>
               </div>
           </div>

       @endforeach
   </div>


   <div class="row">
       <div class="col-md-12">
           <div class="text-center">
               {!! $posts->links() !!}
           </div>
       </div>
   </div>

@endsection
