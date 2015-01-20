<?php


class Catalog extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';


    public static function Catalogs()
    {

        $cats = array();
        if (count(Catalog::all()) > 0) {
            foreach (Catalog::all() as $cat) {
                $cats_ID[$cat['id']][] = $cat;
                $cats[$cat['parent_id']][$cat['id']] = $cat;
            }
            return $cats;
        }
        return '';
    }
    static public function tree($cats,$parent_id,$only_parent = false){
    if(is_array($cats) and isset($cats[$parent_id])){
        $tree = '<ul class="sub-menu">';
        if($only_parent==false){
            foreach($cats[$parent_id] as $cat){
                if (Book::where('category','=',$cat['id'])->count()==0)
                    $tree .= '<li >'.'<p class="title">'.$cat['category_name'].'</p>';
                else
                    $tree .= '<li >'.'<p class="title">'.'<a class="title" href="'.URL::to("catalog").'/'.$cat['id'].'">'.$cat['category_name'].'</a>'.'</p>';
                $tree .=  Catalog::tree($cats,$cat['id']);
                $tree .= '</li>';
            }
        }elseif(is_numeric($only_parent)){
            $cat = $cats[$parent_id][$only_parent];
            $tree .= '<li>'.'<p class="title">'.'<a class="title" href="'.URL::to("catalog").'/'.$cat['id'].'">'.$cat['category_name'].'</a>'.'</p>';
            $tree .=  Catalog::tree($cats,$cat['id']);
            $tree .= '</li>';
        }
        $tree .= '</ul>';
    }
    else return null;
    return $tree;
    }

    static function allCategoryList()
    {
        $catList = DB::table('category')->lists('category_name');
        return $catList;

    }

}
