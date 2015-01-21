<?php


class Author extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'author';
    public static function getIdAuthorList($AuthorName)
    {
        return DB::table('author')->where('author_fio','Like','%'.$AuthorName.'%')->lists('id');
    }
}
