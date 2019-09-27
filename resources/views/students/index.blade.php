@extends('main')

@section('title','| Show Post')

@section('content')
    <div class="card card-shadow p-3">
        <div class="row">
            <div class="col-md-12">
                <table id="datatable" class="table" style="width:100%">
                    <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="align-middle"> {{$user->npm}} </td>
                            <td class="align-middle"> {{$user->name}} </td>
                            <td class="align-middle"> {{$user->email}} </td>
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
                'autoWidth': true,
                'searching': true,
                'processing': true,
                // "columnDefs": [{
                //     "width": "20%",
                //     "targets": 0
                // }]
            });
        });
    </script>
    @endsection
