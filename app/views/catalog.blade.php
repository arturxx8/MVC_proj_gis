@extends('layout')

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
                {{Catalog::tree(CatalogController::Catalogs(),0)}}
            </div>
        </ul>

    </div>
</div>

@stop