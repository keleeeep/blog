@extends('main')

@section('title')

@section('content')

    <div class="single-box" style="background-color: white">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <img src="{{asset('images/'.$post->image)}}" alt="image" class="mt-5 img-fluid">
                    </div>
                </div>
                <p class="card-text pt-3" style="font-size: 1rem;">{{date('F nS, Y - g:i',strtotime($post->created_at))}}</p>
                <h1 class="mt-3 mb-3 formated-text">{{ $post->title }}</h1>
                <div class="text-justify formated-text">
                    <p>{!! $post->body !!}</p>
                </div>
                <hr>
                <p class="mb-0"><strong>Kategori</strong></p>
                <a href="{{route('categories.show',$post->category->id)}}">
                    <p>{{$post->category->name}}</p>
                </a>
                <p class="mb-0"><strong>Label</strong></p>
                @foreach($post->tag as $tag)
                    <a href="{{route('tags.show',$tag->id)}}">
                    <span class="badge badge-secondary">
                        {{$tag->name}}
                    </span>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="comment-title"> {{$post->comments()->count()}} Komentar</h3>
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <div class="author-info">
                            <img alt="avatar" src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=wavatar"}}" class="author-image">
                            <div class="author-name">
                                <h4>{{$comment->name}}</h4>
                                <h6>{{$comment->email}}</h6>
                                <p class="author-time">{{date('F nS, Y - g:i',strtotime($comment->created_at))}}</p>
                            </div>
                        </div>
                        <div class="comment-content">
                            {{$comment->comment}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row mb-5">
            <div id="comment-form" class="col-md-8 offset-md-2">
                {{Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])}}

                <div class="row">
                    {{--<div class="col-md-6">--}}
                        {{--{{Form::label('name','Name:')}}--}}
                        {{--{{Form::text('name',null,['class'=>'form-control'])}}--}}
                    {{--</div>--}}

                    {{--<div class="col-md-6">--}}
                        {{--{{Form::label('email','Email:')}}--}}
                        {{--{{Form::text('email',null,['class'=>'form-control'])}}--}}
                    {{--</div>--}}

                    <div class="col-md-12 mb-3 mt-3">
                        {{Form::label('comment','Komentar')}}
                        {{Form::textarea('comment',null,['class'=>'form-control','rows'=>5])}}

                        {{Form::submit('Tambahkan Komentar',['class'=>'btn btn-primary btn-block mt-3 mb-5'])}}
                    </div>

                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection

