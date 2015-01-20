<?php


class Catalog extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

    static function allCategoryList()
    {
        $catList = DB::table('category')->lists('category_name');
        return $catList;
    }

}
