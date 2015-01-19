
@extends('layout')
@section('title')
    Логин - Библиотека ГМГС
@stop
@section('nav-login')
    class="active"
@stop
@section('content')

    <!-- check for login error flash var -->
    @if (Session::has('flash_error'))
        <div class="alert alert-error">{{ Session::get('flash_error') }}</div>
    @endif

    {{ Form::open(array('url' => 'login', 'method' => 'POST')) }}

    <!-- username field -->
    <p>
        {{ Form::label('login', 'Login') }}<br/>
        {{ Form::text('login', Input::old('login')) }}
    </p>

    <!-- password field -->
    <p>
        {{ Form::label('password', 'Password') }}<br/>
        {{ Form::password('password') }}
    </p>

    <!-- submit button -->
    <p>{{ Form::submit('Login') }}</p>

    {{ Form::close() }}
@stop