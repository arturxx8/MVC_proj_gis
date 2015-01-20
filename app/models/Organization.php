<?php


class Organization extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organization';
    static function allOrgList()
    {
        $orgList = DB::table('organization')->lists('organizationname');
        return $orgList;

    }
}
