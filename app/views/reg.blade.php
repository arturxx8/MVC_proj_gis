@extends('layout')

@section('title')
    Регистрация - Библиотека ГМГС
@stop
@section('nav-reg')
    class="active"
@stop
@section('content')

    <!-- check for login error flash var -->
    @if (Session::has('flash_error'))
        <div class="alert alert-error">{{ Session::get('flash_error') }}</div>
    @endif

    {{ Form::open(array('url' => 'reg', 'method' => 'POST','files'=>true)) }}

    <!-- username field -->
    <p>
        {{ Form::label('login', '*Логин') }}<br/>
        {{ Form::text('login', Input::old('login')) }}
    </p>

    <!-- password field -->
    <p>
        {{ Form::label('password', '*Пароль') }}<br/>
        {{ Form::password('password') }}
    </p>
    <!-- password2 field -->
    <p>
        {{ Form::label('password2', '*Подтвердите пароль') }}<br/>
        {{ Form::password('password2') }}
    </p>
    <p>
        {{ Form::label('name', '*Имя') }}<br/>
        {{ Form::text('name'),Input::old('name') }}
    </p>
    <p>
        {{ Form::label('surname', '*Фамилия') }}<br/>
        {{ Form::text('surname'), Input::old('surname') }}
    </p>
    <p>
        {{ Form::label('patronymic', 'Отчество') }}<br/>
        {{ Form::text('patronymic'),Input::old('patronymic') }}
    </p>
    <p>
        {{ Form::label('datebirth', '*Дата рождения') }}<br/>
        {{ Form::input('date','datebirth'),Input::old('datebith') }}
    </p>
    <p>
        {{ Form::label('organization', '*Организация') }}<br/>
        {{ Form::select('organization',Organization::allOrgList()) }}
    </p>
    <p>
        {{ Form::label('department', '*Отдел') }}<br/>
        {{ Form::select('department',Department::allDepartList()) }}
    </p>
    <p>
        {{ Form::label('address', '*E-mail') }}<br/>
        {{ Form::text('address'),Input::old('address') }}
    </p>
    <p>
        {{ Form::label('telephone', 'Телефон') }}<br/>
        {{ Form::text('telephone'),Input::old('telephone') }}
    </p>
    <p>
        {{ Form::label('image', 'Аватар') }}<br/>
        {{ Form::file('image'); }}
    </p>
    <p>
        {{ Form::label('secpic', '*Введите код с картинки') }}<br/>
        {{ Form::text('secpic') }}
    </p>
    <p>а картинки то и нет=)</p>
    <!-- submit button -->
    <p>{{ Form::submit('Зарегестрироваться') }}</p>

    {{ Form::close() }}
@stop