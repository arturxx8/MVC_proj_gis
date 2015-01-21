<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::any('/env', function(){
 return App::environment();
});

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showHomePage'));

Route::get('login', array('as' => 'login', 'uses' => 'LoginController@showLoginPage'))
    ->before('guest');

Route::post('login', 'LoginController@SignIn')
    ->before('csrf')
    ->before('guest');

Route::get('logout', array('as' => 'logout', 'uses'=>'LoginController@LogOut' ))
    ->before('auth');

Route::get('profile', array('as' => 'profile', 'uses'=>'ProfileController@ShowProfile'))
    ->before('auth');

Route::get('reg', array('as' => 'reg', 'uses'=>'LoginController@showRegisterPage'))
    ->before('guest');

Route::post('reg', 'LoginController@Registration')
    ->before('guest');

Route::get('catalog', 'CatalogController@showCatalog')->before('auth'); // НЕТ ПРОВЕРКИ НА ПУСТОЙ КАТАЛОГ

Route::pattern('id', '[0-9]+');
Route::get('catalog/{id}', 'CategoryController@showCategory')->before('auth');

Route::get('annot/{id}', 'AnnotController@showAnnot')->before('auth');

Route::get('search', array('as' => 'search', 'uses'=>'SearchController@SearchBooksExtend'))
    ->before('auth');

Route::post('search', 'SearchController@SearchBooks')
    ->before('csrf')
    ->before('auth');

Route::post('takeBook', 'TakeBookController@TakeBook')
    ->before('csrf')
    ->before('auth');

Route::controller('password', 'RemindersController');
Route::get('remind_pass','RemindersController@getRemind');

