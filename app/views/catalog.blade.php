@extends('layout')
<?
function tree($cats,$parent_id,$only_parent = false){
if(is_array($cats) and isset($cats[$parent_id])){
$tree = '<ul class="sub-menu">';
    if($only_parent==false){
    foreach($cats[$parent_id] as $cat){
        $tree .= '<li >'.'<p class="title">'.'<a class="title" href="'.URL::to("catalog").'/'.$cat['id'].'">'.$cat['category_name'].'</a>'.'</p>';
        $tree .=  tree($cats,$cat['id']);
        $tree .= '</li>';
    }
    }elseif(is_numeric($only_parent)){
    $cat = $cats[$parent_id][$only_parent];
        $tree .= '<li>'.'<p class="title">'.$cat['category_name'].'</p>';
        $tree .=  tree($cats,$cat['id']);
        $tree .= '</li>';
    }
    $tree .= '</ul>';
}
else return null;
return $tree;
}
?>
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
                {{tree(CatalogController::Catalogs(),0)}}
            </div>
        </ul>

    </div>
</div>

@stop