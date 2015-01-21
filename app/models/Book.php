<?php


class Book extends Eloquent  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'book';
    protected $primaryKey = 'id_book';

    public function author(){
        return $this->belongsTo('Author','author');
    }

    public static function searchBook($KeyData)
    {
        $booksIdList=DB::table('book')
            ->where('title','Like','%'.$KeyData['Title'].'%')
            ->whereIN('author',Author::getIdAuthorList($KeyData['AuthorName']))
            ->whereIN('category',Catalog::getCategorList($KeyData['Category']))
            ->lists('id_book');

        return $booksIdList;
    }

    public static function getTitleforID($id)
    {
        return DB::table('book')->where('id_book', $id)->pluck('title');
    }
}
