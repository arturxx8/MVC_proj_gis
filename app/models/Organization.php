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
    static function IdOrg($id)
    {
        $orgList = DB::table('organization')->lists('id');
        return $orgList[$id];
    }
}
