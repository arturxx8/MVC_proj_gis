@extends('layout')
<?php $i=0?>
@section('title')
    Каталог - Библиотека ГМГС
@stop
@section('nav-catalog')
    class="active"
@stop
@section('content')
    <div class="row-fluid">
        <div class="span10">
            <h1>Каталог</h1>
            <ul class="thumbnails newBooks">
                <div class="clearfix">
                    <?php $books=Book::where('category','=',$id)->get();?>
                    @foreach ($books as $book)
                    <li><a href='{{URL::to('annot').'/'.$book->id_book}}'><p>&nbsp{{++$i}} {{$book->title}}, {{Author::find($book->author)->author_fio}} - {{$book->totalpages}}&nbsp стр., {{$book->publish}}, {{$book->year}} г.</p></a></li>
                    @endforeach
                </div>
            </ul>
        </div>
    </div>
@stop