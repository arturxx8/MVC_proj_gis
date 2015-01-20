@extends('layout')
<?
function tree($cats,$parent_id,$only_parent = false){
if(is_array($cats) and isset($cats[$parent_id])){
$tree = '<ul class="sub-menu">';
    if($only_parent==false){
    foreach($cats[$parent_id] as $cat){
<<<<<<< HEAD
    $tree .= '<li >'.'<p class="title">'.'<a class="title" href="'.URL::to("catalog").'/'.$cat['id'].'">'.$cat['category_name'].'</a>'.'</p>';
=======
        $tree .= '<li >'.'<p class="title">'.'<a class="title" href="'.URL::to("catalog").'/'.$cat['id'].'">'.$cat['category_name'].'</a>'.'</p>';
>>>>>>> 6153e349d07d67cc97f8b43b61069d78dc1d0cb3
        $tree .=  tree($cats,$cat['id']);
        $tree .= '</li>';
    }
    }elseif(is_numeric($only_parent)){
    $cat = $cats[$parent_id][$only_parent];
<<<<<<< HEAD
    $tree .= '<li>'.'<p class="title">'.'<a class="title" href="'.URL::to("catalog").'/'.$cat['id'].'">'.$cat['category_name'].'</a>'.'</p>';
=======
        $tree .= '<li>'.'<p class="title">'.$cat['category_name'].'</p>';
>>>>>>> 6153e349d07d67cc97f8b43b61069d78dc1d0cb3
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
<<<<<<< HEAD
                {{tree(Catalog::Catalogs(),0)}}
=======
                {{tree(CatalogController::Catalogs(),0)}}
>>>>>>> 6153e349d07d67cc97f8b43b61069d78dc1d0cb3
            </div>
        </ul>

    </div>
</div>

@stop