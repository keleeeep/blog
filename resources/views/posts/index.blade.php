@extends('main')

@section('title','| Daftar Artikel')

@section('content')
    <div class="card card-shadow p-3">
        <div class="row">
            <div class="col-md-10">
                <h1 style="margin-top: 4px !important; margin-bottom: 4px !important;">Daftar Artikel</h1>
            </div>
            @if($admin->is_edit)
                <div class="col-md-2 align-right">
                    <a href="{{route('posts.create')}}" class="btn btn-primary btn-block mt-2 float-right" >Buat Artikel</a>
                </div>
            @endif
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-11" style="margin-top:0 !important; padding-top: 0 !important">
                <table id="datatable" class="table">
                    <thead>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Dibuat pada</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="align-middle"> {{$post->title}} </td>
                            <td class="align-middle"> {{ substr(strip_tags($post->body),0,130) }} {{strlen(strip_tags($post->body)) > 130 ? "..." : ""}} </td>
                            <td class="align-middle"> {{date('M j, Y',strtotime($post->created_at))}} </td>
                            <td class="align-middle">
                                <a href="{{route('posts.show',$post->id)}}" class="btn btn-outline-dark btn-sm mb-3" style="width: 80px;">Lihat</a>
                                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-outline-dark btn-sm" style="width: 80px;">Sunting</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                'paging': true,
                'lengthChange': true,
                'ordering': true,
                'info': true,
                'searching': true,
                'processing': true,
            });
        });
    </script>
@endsection
