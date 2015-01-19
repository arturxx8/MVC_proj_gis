@extends('layout')
@section('title')
    Личный кабинет - Библиотека ГМГС
@stop
@section('nav-profile')
    class="active"
@stop
@section('content')
    <h2>Welcome "{{ Auth::user()->login }}" to the protected page!</h2>
    <p>Your user ID is: {{ Auth::user()->id }}</p>
@stop