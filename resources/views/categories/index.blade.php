@extends('main')

@section('title',"| Categories")

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-shadow p-3">
            <table class="table" id="datatable">
                <thead>
                <tr>
                    {{--<th>#</th>--}}
                    <th>Daftar Kategori</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        {{--<td>{{$category->id}}</td>--}}
                        <td>{{$category->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
        {{--<div class="col-md-4">--}}
            {{--<div class="card bg-gray-active card-shadow">--}}
                {{--<div class="card-body">--}}
                    {{--{!! Form::open(['route'=>'categories.store']) !!}--}}
                    {{--<h2>New Category</h2>--}}
                    {{--{{Form::label('name','Name:')}}--}}
                    {{--{{Form::text('name',null,['class'=>'form-control mb-3'])}}--}}
                    {{--{{Form::submit('Create New Category',['class'=>'btn btn-primary btn-block'])}}--}}

                    {{--{!! Form::close() !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>
    <br>
    <br>


@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                // 'paging': true,
                // 'lengthChange': true,
                // 'ordering': true,
                // 'info': true,
                // 'autoWidth': true,
                // 'searching': true,
                // 'processing': true,
                // "columnDefs": [{
                //     "width": "20%",
                //     "targets": 0
                }]
            });
        });
    </script>
@endsection
