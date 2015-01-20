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
}