
@extends('layout')

@section('content')
    <h1>Login</h1>

    <!-- check for login error flash var -->
    @if (Session::has('flash_error'))
        <div id="flash_error">{{ Session::get('flash_error') }}</div>
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