@extends('layout')

@section('title')
    Поиск - Библиотека ГМГС
@stop

@section('content')
    //Здесь будет форма поиска...

    <!-- check for login error flash var -->
    @if (Session::has('flash_error'))
        <div class="alert alert-error">{{ Session::get('flash_error') }}</div>
    @endif

    {{ Form::open(array('url' => 'search', 'method' => 'POST')) }}

    <!-- AuthorName field -->
    <p>
        {{ Form::label('AuthorName', 'Имя автора:') }}<br/>
        {{ Form::text('AuthorName', Input::old('AuthorName')) }}
    </p>

    <!-- Title field -->
    <p>
        {{ Form::label('Title', 'Название:') }}<br/>
        {{ Form::text('Title', Input::old('Title')) }}
    </p>
    <!-- password2 field -->
    <p>
        {{ Form::label('Category', 'Категория') }}<br/>
        {{ Form::select('Category',Catalog::allCategoryList())}}
    </p>

    <!-- submit button -->
    <p>{{ Form::submit('Отправить данные',array('class'=>'login')) }}</p>

    {{ Form::close() }}
@stop