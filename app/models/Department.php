<?php


class Department extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'department';
    protected $list = DB::table('department')->lists('departmentName');

}
