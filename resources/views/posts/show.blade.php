@extends('main')

@section('title','| Artikel')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-shadow p-3">
                <img src="{{asset('images/'.$post->image)}}" alt="image" class="mb-5 img-fluid">
                <h1> {{$post->title}} </h1>
                <p> {!! $post->body !!} </p>
                <hr>
                <div id="backend-comments" class="mb-4">
                    <h3 style="margin-bottom:16px !important">Komentar <small>{{$post->comments()->count()}} total</small> </h3>
                    <table class="table" id="datatable">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Komentar</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($post->comments as $comment)
                            <tr>
                                <td class="align-middle">{{$comment->name}}</td>
                                <td class="align-middle">{{$comment->email}}</td>
                                <td class="align-middle">{{$comment->comment}}</td>
                                <td class="align-middle">
                                    <a href="{{route('comments.delete',$comment->id)}}" class="btn btn-sm btn-outline-danger comment-action">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card card-shadow">
                <div class="card-body">
                    <p class="card-text mb-0"><strong>Slug</strong></p>
                    <p><a href="{{ route('blog.single', $post->slug) }}">{{route('blog.single', $post->slug)}}</a></p>
                    <p class="card-text mb-0"><strong>Kategori</strong></p>
                    <p>{{$post->category->name}}</p>
                    <p class="card-text mb-0"><strong>Dibuat Pada</strong></p>
                    <p>{{date('M j, Y h:i a',strtotime($post->created_at))}}</p>
                    <p class="cart-text mb-0"><strong>Diperbarui Pada</strong></p>
                    <p>{{date('M j, Y h:i a',strtotime($post->updated_at))}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            {!! Html::linkRoute('posts.edit','Sunting',array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-6">
                            {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
                            {!! Form::submit('Hapus',['class'=>'btn btn-danger btn-block'])  !!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            {{ Html::linkRoute('posts.index', '<< Lihat Semua Artikel', [], ['class'=>'btn btn-default btn-block mt-3']) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
        </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
            });
        });
    </script>
@endsection
