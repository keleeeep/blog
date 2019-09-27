@extends('main')

@section('title','| Edit Post')

@section('stylesheet')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-shadow p-3">
            <h1 style="margin-bottom:0px !important">Sunting Artikel</h1>
            <hr>
            {!! Form::model($post, ['route'=>['posts.update', $post->id],'method'=>'PUT','files'=>true]) !!}

            {{Form::label('title','Judul')}}
            {{Form::text('title',null,['class'=>'form-control form-control-lg mb-3'])}}

            {{Form::label('slug','Slug')}}
            {{Form::text('slug',null,['class'=>'form-control mb-3'])}}

            {{Form::label('category_id','Kategori')}}
            {{Form::select('category_id',$categories,null,['class'=>'form-control mb-3'])}}

            {{Form::label('tags','Label')}}
            {{Form::select('tags[]',$tag,null,array('class'=>'form-control select2-multi','multiple'=>'multiple'))}}


            {{Form::label('featured_image','Unggah Gambar Baru',['class'=>'mt-4'])}}
            <br>
            {{Form::file('featured_image')}}
            <br>

            {{Form::label('body','Isi Artikel',['class'=>'mt-4'])}}
            {{Form::textarea('body',null,['class'=>'form-control'])}}
        </div>

    </div>

    <div class="col-md-4">
        <div class="card card-shadow">
            <div class="card-body">
                <p class="card-text mb-0"><strong>Dibuat Pada</strong></p>
                <p>{{date('M j, Y h:i a',strtotime($post->created_at))}}</p>
                <p class="cart-text mb-0"><strong>Diperbarui Pada</strong></p>
                <p>{{date('M j, Y h:i a',strtotime($post->updated_at))}}</p>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                    </div>
                    <div class="col-md-6">
                        {!! Html::linkRoute('posts.show','Batal',array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar:false
        });
    </script>

    <script>
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tag()->pluck('tag_id')) !!}).trigger('change');
    </script>
@endsection
