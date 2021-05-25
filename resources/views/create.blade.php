<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pages Analyzer</title>
</head>
<title>
    @section('title')
        Pages Analyzer
    @endsection
</title>
<body>

@include('flashes.flashMessage')
@extends('layouts.boilerplate')

@section('refs')
    <a href="{{ route('analyzer.formShow') }}">Главная</a>
    <a href="{{ route('analyzer.index') }}">Список сайтов</a>
@endsection

@section('form')
    <form class="form" action="{{ route('analyzer.store') }}" method="post">
        @csrf
        <label>
            <input type="text" name="url" placeholder="http://www.example.com" required>
            <input type="submit" name="submit" value="Ввести">
        </label>
    </form>
@endsection

</body>
</html>
