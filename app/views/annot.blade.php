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
        <div class="span6">
        <h1>Каталог</h1>
            <ul class="thumbnails newBooks">
                <div class="clearfix">
                    <?php
                    echo '<p style="font-size:30px;"><b>'.$book->title.'</b></p>';
                    $filename = URL::to('img').'/'.$book->id_book.'.jpg';
                    if (file_exists($filename)){
                        echo '<img src="'.$filename.'" style="width: 300px; heigth: 500px;" class="thumbnail" width="150">';}
                    else {
                        echo '<img src="'.URL::to('img').'/def.jpg" style="width: 300px; heigth: 500px;"  class="thumbnail" >';
                    }
                    echo '<p class="green1">'.'<b>Автор:&nbsp</b>' .'<br>'.Author::find($book->author)->author_fio.'</p>';
                    if (strlen($book->text) > 1){
                        echo '<p class="green">'.'<b>Описание:&nbsp</b>'.'<br>'.$book->text.'</p>';}
                    else {
                        echo '<p class="green">'.'<b>Описание&nbsp</b>'.' отсутсвует'.'</p>';
                    }
                    echo '<p class="green1">'.'<b>Страниц:&nbsp</b>' .'<br>'.$book->totalpages.'</p>';
                    if (strlen($book->publish) >= 1){
                        echo '<p class="green1">'.'<b>Издание:&nbsp</b>'.'<br>'.$book->publish.'&nbsp'.$book->year.'</p>';}
                    else {
                        echo '<p class="green1">'.'<b>Издание&nbsp</b>'.'не указано</b>'.'</p>';
                    }
                    if ($book->status == 1) {
                        echo '<button class="btn" onclick="javascript: goToPage()">Взять почитать</button>';}
                    else {
                        echo'<p><b>Книга отсутсвует в библиотеке</b></p>';
                        echo '<button disabled class="btn" disabled onclick="javascript: goToPage()">Взять почитать</button>';
                    }
                    ?>

                </div>
            </ul>
        </div>
    </div>
@stop