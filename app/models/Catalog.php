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

    static function allCategoryList()
    {
        $catList = DB::table('category')->lists('category_name');
        return $catList;

    }

}
