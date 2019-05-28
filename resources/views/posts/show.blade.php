@extends('main')

@section('title','| Show Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1> {{$post->title}} </h1>
            <p> {{$post->body}} </p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p class="card-text mb-0"><strong>Slug</strong></p>
                    <p><a href="{{ route('blog.single', $post->slug) }}">{{route('blog.single', $post->slug)}}</a></p>
                    <p class="card-text mb-0"><strong>Created at</strong></p>
                    <p>{{date('M j, Y h:i a',strtotime($post->created_at))}}</p>
                    <p class="cart-text mb-0"><strong>Updated at</strong></p>
                    <p>{{date('M j, Y h:i a',strtotime($post->updated_at))}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            {!! Html::linkRoute('posts.edit','Edit',array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-6">
                            {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block'])  !!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            {{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class'=>'btn btn-default btn-block mt-3']) }}
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection