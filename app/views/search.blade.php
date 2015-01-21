@extends('layout')

@section('title')
    Поиск - Библиотека ГМГС
@stop

@section('content')

    <!--Здесь будет результат поиска...-->

    <?php
        echo '<h1>Результаты поиска:</h1>';

        foreach ($result as $booksID)
        {
            echo '<a class="title" href="http://localhost/annot/'.$booksID.'">'.Book::getTitleforID($booksID).'</a>'.'<br>';
        }
    ?>
@stop