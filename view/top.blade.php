@extends('layout/template')
@section('title', 'ようこそ')
@section('style', 'css/top.css')

@include('layout/header')

@section('content')
    <p id="today_lineup">〜本日のラインナップ〜</p>
    <hr>
    @foreach($dishes as $key => $dish)
        @include('dish_form')
        <hr>
    @endforeach
@endsection
