<?php

class CatalogController extends BaseController {

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

<<<<<<< HEAD

=======
    public static function Catalogs() {

        $cats = array();
        if (count(Catalog::all()) > 0){
            foreach (Catalog::all() as $cat) {
                $cats_ID[$cat['id']][] = $cat;
                $cats[$cat['parent_id']][$cat['id']] = $cat;
            }
            return $cats;
        }
        return '';
    }
>>>>>>> 6153e349d07d67cc97f8b43b61069d78dc1d0cb3


    public function showCatalog()
    {

        return View::make('catalog');
        //return App::abort(404,'Нет каталогов');
    }

}