<?php

class Department extends Eloquent {

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

}