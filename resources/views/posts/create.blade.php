@extends('main')

@section('title','| Create New Post')

@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
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
    <div class="col-md-8 offset-md-2">
        
        <h1>Create New Post</h1>
        <hr>

        {!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'')) !!}
            {{Form::label('title', 'Title:') }}
            {{Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255','style'=>'margin-bottom: 20px;')) }}
            {{Form::label('slug', 'Slug:')}}
            {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255','style'=>'margin-bottom: 20px;'))}}
            {{Form::label('category_id','Categgory:')}}
            <select class="form-control mb-4" name="category_id" id="">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            {{Form::label('body', 'Post Body:') }}
            {{Form::textarea('body',null,array('class'=>'form-control','required'=>'')) }}
            {{Form::submit('Create Post',array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top: 20px;')) }}
        {!! Form::close() !!}
    
    </div>
</div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
@endsection
