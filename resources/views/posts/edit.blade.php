@extends('main')

@section('title','| Edit Post')

@section('stylesheet')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        {!! Form::model($post, ['route'=>['posts.update', $post->id],'method'=>'PUT']) !!}
        {{Form::label('title','Title:')}}
        {{Form::text('title',null,['class'=>'form-control form-control-lg mb-3'])}}
        {{Form::label('slug','Slug:')}}
        {{Form::text('slug',null,['class'=>'form-control mb-3'])}}
        {{Form::label('category_id','Category:')}}
        {{Form::select('category_id',$categories,null,['class'=>'form-control mb-3'])}}
        {{Form::label('tags','Tags:')}}
        {{Form::select('tags[]',$tag,null,array('class'=>'form-control select2-multi','multiple'=>'multiple'))}}
        {{Form::label('body','Post Body:')}}
        {{Form::textarea('body',null,['class'=>'form-control'])}}
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <p class="card-text mb-0"><strong>Created at</strong></p>
                <p>{{date('M j, Y h:i a',strtotime($post->created_at))}}</p>
                <p class="cart-text mb-0"><strong>Updated at</strong></p>
                <p>{{date('M j, Y h:i a',strtotime($post->updated_at))}}</p>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block'])}}
                    </div>
                    <div class="col-md-6">
                        {!! Html::linkRoute('posts.show','Cancel',array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
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

    <script>
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tag()->pluck('tag_id')) !!}).trigger('change');
    </script>
@endsection
