@extends('main')

@section('title','| Show Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1> {{$post->title}} </h1>
            <p> {!! $post->body !!} </p>
            <hr>
            <div class="tags">
                @foreach($post->tag as $tag)
                    <span class="badge badge-secondary">
                        {{$tag->name}}
                    </span>
                @endforeach
            </div>
            <div id="backend-comments" class="mb-4">
                <h3>Comments <small>{{$post->comments()->count()}} total</small> </h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($post->comments as $comment)
                            <tr>
                                <td class="align-middle">{{$comment->name}}</td>
                                <td class="align-middle">{{$comment->email}}</td>
                                <td class="align-middle">{{$comment->comment}}</td>
                                <td class="align-middle">
                                    <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-sm btn-outline-primary comment-action">Edit</a>
                                    <a href="{{route('comments.delete',$comment->id)}}" class="btn btn-sm btn-outline-danger comment-action">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p class="card-text mb-0"><strong>Slug</strong></p>
                    <p><a href="{{ route('blog.single', $post->slug) }}">{{route('blog.single', $post->slug)}}</a></p>
                    <p class="card-text mb-0"><strong>Category</strong></p>
                    <p>{{$post->category->name}}</p>
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
