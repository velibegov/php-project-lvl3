<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Site</title>
</head>
<body>
@include('flashes.flashMessage')
@extends('layouts.boilerplate')

@section('refs')
    <a href="{{ route('analyzer.formShow') }}">Главная</a>
    <a href="{{ route('analyzer.index') }}">Список сайтов</a>
@endsection

@section('sites')
    <h1>Список сайтов:</h1>
<table>
    @foreach($urls as $url)
        <tr>
            <td>{{$url->id}}</td>
            <td>{{$url->name}}</td>
            <td>{{$url->created_at}}</td>
        </tr>
    @endforeach
</table>
@endsection
</body>
</html>
