@extends('main')

@section('title',"| Daftar Kategori")

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-shadow p-3">
            <table class="table" id="datatable">
                <thead>
                <tr>
                    <th>Daftar Kategori</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                })
        });
    </script>
@endsection
