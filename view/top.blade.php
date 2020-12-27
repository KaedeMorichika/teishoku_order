@extends('layout/template')
@section('title', 'ようこそ')
@section('style', 'css/top.css')

@include('layout/header')

@section('content')
    <p id="today_lineup">〜本日のラインナップ〜</p>
    <hr>
    @foreach($dishes as $key => $dish)
        <div class="dish">
            <button class="btn dish-btn">
                <div>{{$dish->name}}</div>
                <div>¥{{$dish->price}}</div>
            </button>
            <div>{{$dish->info}}</div>
        </div>
        <hr>
    @endforeach
@endsection
