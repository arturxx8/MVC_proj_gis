<?php

class SearchController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function SearchBooks()
    {
        $KeyData = array(
            'AuthorName' => Input::get('AuthorName'),
            'Title' => Input::get('Title'),
            'Category' => Input::get('Category')
        );

        if ($KeyData['AuthorName']=='') $KeyData['AuthorName']='%';
        if ($KeyData['Title']=='') $KeyData['Title']='%';
        if ($KeyData['Category']=='Каталог литературы') $KeyData['Category']='%';

        $result=Book::searchBook($KeyData);//'результат поиска';

        return View::make('search')->with('result',$result)->with('KeyData',$KeyData);
    }

    public function SearchBooksExtend()
    {
        return View::make('searchForm');
    }

}
