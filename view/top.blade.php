@extends('layout/template')
@section('title', 'ようこそ')
@section('style', 'css/top.css')

@include('layout/header')

@section('content')
    <p id="today_lineup">〜本日のラインナップ〜</p>
    <div id="dish-app">
        @foreach($dishes as $key => $dish)
            <dish-item :dish-json='@json($dish)'></dish-item>
            <hr>
        @endforeach
    </div>
    <script src="view/js/dishItem.js"></script>
    <script src="view/js/top.js"></script>
@endsection
