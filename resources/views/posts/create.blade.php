@extends('main')

@section('title','| Buat Artikel Baru')

@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')

{{-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Create New Post</h1>
          <hr>
          <form method="POST" action="{{ route('posts.store') }}">
            <div class="form-group">
              <label name="title">Title:</label>
              <input id="title" name="title" class="form-control">
            </div>
            <div class="form-group">
              <label name="body">Post Body:</label>
              <textarea id="body" name="body" rows="10" class="form-control"></textarea>
            </div>
            <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
          </form>
        </div>
      </div> --}}

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card card-shadow p-3">
            <h1>Create New Post</h1>
            <hr>

            {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate'=>'', 'files'=>true)) !!}

            {{Form::label('title', 'Judul') }}
            {{Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255','style'=>'margin-bottom: 20px;')) }}

            {{Form::label('slug', 'Slug')}}
            {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255','style'=>'margin-bottom: 20px;'))}}

            {{Form::label('category_id','Kategori')}}
            <select class="form-control mb-4" name="category_id" id="">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            {{Form::label('tags','Label')}}
            <select class="form-control select2-multi" name="tags[]" id="" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>

            {{Form::label('featured_image','Unggah Foto',['class'=>'mt-4'])}}
            <br>
            {{Form::file('featured_image')}}

            <br>

            {{Form::label('body', 'Isi Artikel',['class'=>'mt-4']) }}
            {{Form::textarea('body',null,array('class'=>'form-control','required'=>'')) }}

            {{Form::submit('Buat Artikel',array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top: 20px;')) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
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
  </script>
@endsection
