<?php

class AnnotController extends BaseController {


    public function showAnnot($id)
    {
        return View::make('annot',array('book'=>Book::find($id)));
    }

}