@extends('layout')
<?php
function FormatDate($date){
    $newDate =  DateTime::createFromFormat('Y-m-d', $date) -> format('d-m-Y');
    return $newDate;
}?>
@section('title')
    Личный кабинет - Библиотека ГМГС
@stop
@section('nav-profile')
    class="active"
@stop
@section('content')
    <div class="row-fluid">
        <div class="span6">
            <h1>Личный кабинет</h1>
            <table>
                <colgroup width="230" >
                <colgroup width="150" >
                    <tr> <td rowspan="10" align="center">
                        <?php
                            $filename='/img/readers/'.Auth::user()->url_pic;
                        if (file_exists(public_path().$filename)){
                        echo '<img src="'.URL::to('/').$filename.'" style="width: 300px; heigth: 500px;" class="thumbnail" width="150">';}
                        else {
                        echo '<img src="'.URL::to('img/lib_photos').'/default.jpg" style="width: 300px; heigth: 500px;"  class="thumbnail" >';
                        }?>
                       </td>
                    </tr>
                    <tr>
                        <td>Фамилия:</td>
                        <td class="td">{{Auth::user()->surname}}</td>
                    </tr>
                    <tr>
                        <td>Имя:</td>
                        <td class="td">{{Auth::user()->name}}</td>
                    </tr>
                    <tr>
                        <td>Отчество:</td>
                        <td class="td">{{Auth::user()->patronymic}}</td>
                    </tr>
                    <tr>
                        <td>Дата рождения:</td>
                        <td class="td">{{(Auth::user()->datebirth!='')?FormatDate(Auth::user()->datebirth):""}}</td>
                    </tr>
                    <tr>
                        <td>Организация:</td>
                        <td class="td">{{Organization::find(Auth::user()->organization)->organizationname}}</td>
                    </tr>
                    <tr>
                        <td>Отдел:</td>
                        <td class="td">{{Department::find(Auth::user()->department)->departmentname}}</td>
                    </tr>
                    <tr>
                        <td>Группа:</td>
                        <td class="td">{{Auth::user()->position}}</td>
                    </tr>
                    <tr>
                        <td>Телефон:</td>
                        <td class="td">{{Auth::user()->telephone}}</td>
                    </tr>
                    <tr>
                        <td >Адрес:</td>
                        <td class="td">{{Auth::user()->address}}</td>
                    </tr>
                    <tr>
                        <td><a href="javascript:doPopup('/edit/{{Auth::user()->id}}');">Редактировать данные</a></td>

                    </tr>
                    <tr>
                        <td><a href='javascript:doPopup("/history");'>История операций</a></td>
                    </tr>
                </colgroup>
                </colgroup>

            </table>
        </div>
        <div>
            <h1>Список выданной литературы</h1>
            <table  class="tabl" border="2" width="650">
                <colgroup>
                    <th>Дата</th><th>Автор</th><th>Наименование</th><th>Штрих-код</th>
                </colgroup>

                <?php

                EventTable::where( 'barcode_reader','=', Auth::user()->barcode)->where('status', '=' ,'2')->chunk(20,function($events)
                {
                  foreach ($events as $event)
                    {
                        $q=$event->barcode_book;
                        $book=Book::where('barcode_book','=',$q)->get()->toArray();
                        $author_fio=Author::find($book[0]['author'])->author_fio;
                        echo '<tr><td>'.FormatDate($event->date_start).'</td><td>'.$author_fio.'</td><td>'.$book[0]['title'].'</td><td>'.$book[0]['barcode_book'].'</td></tr>';

                    }
                });
                if (0==EventTable::where( 'barcode_reader','=', Auth::user()->barcode)->where('status', '=' ,'2')->count())
                    echo '<tr><td colspan=4 text-align="center">Ничего нет</td></tr>';

                ?>

            </table> <br>
        </div>
    </div>
@stop