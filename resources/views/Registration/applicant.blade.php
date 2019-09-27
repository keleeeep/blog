{{--@extends('main')--}}

{{--@section('title')--}}

{{--@section('content')--}}
    {{--<h1>Customer List</h1>--}}
    {{--<a href="{{ URL::to('/registration/pdf') }}">Export PDF</a>--}}
    {{--<table>--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th>ID</th>--}}
            {{--<th>Name</th>--}}
            {{--<th>Email</th>--}}
            {{--<th>Phone</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@foreach($reg as $customer)--}}
            {{--<tr>--}}
                {{--<td>{{ $customer->id }}</td>--}}
                {{--<td>{{ $customer->name }}</td>--}}
                {{--<td>{{ $customer->email }}</td>--}}
                {{--<td>{{ $customer->npm }}</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
    {{--</table>--}}
{{--@endsection--}}

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Customer List</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $reg->id }}</td>
            <td>{{ $reg->name }}</td>
            <td>{{ $reg->email }}</td>
            <td>{{ $reg->npm }}</td>
        </tr>
    </tbody>
</table>
</body>
</html>

