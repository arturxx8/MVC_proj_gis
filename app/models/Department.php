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
    static function IdDep($name)
    {
        $name = DB::table('department')->where('departmentname', $name)->pluck('id');
        return $name;
    }
}
