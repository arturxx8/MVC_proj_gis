<?php


class Department extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'department';
    static function allDepartList()
    {
        $depList = DB::table('department')->lists('departmentname');
        return $depList;

    }
    static function IdDep($id)
    {
        $depList = DB::table('department')->lists('id');
        return $depList[$id];
    }
}
