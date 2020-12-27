@extends('layout/template')
@section('title', 'ようこそ')
@section('style', 'top')

@include('layout/header')

@section('content')
    @foreach($dishes as $key => $dish)
        <button class="btn dish-btn">
            <div>{{$dish->name}}</div>
            <div>{{$dish->price}}</div>
        </button>
    @endforeach
@endsection
