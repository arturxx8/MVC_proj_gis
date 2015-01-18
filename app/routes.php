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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));

Route::get('login', array('as' => 'login', function () {
    return View::make('login');
}))->before('guest');

Route::post('login', function () {
    $user = array(
        'login' => Input::get('login'),
        'password' => Input::get('password')
    );

    if (Auth::attempt($user)) {
        Session::flash('flash_notice', 'You are successfully logged in.');
        return Redirect::route('home');
    }

    // authentication failure! lets go back to the login page
    return Redirect::route('login')
        ->with('flash_error', 'Your username/password combination was incorrect.')
        ->withInput();
})->before('csrf');

Route::get('logout', array('as' => 'logout', function () {
    Auth::logout();

    return Redirect::route('home')
        ->with('flash_notice', 'You are successfully logged out.');
}))->before('auth');

Route::get('profile', array('as' => 'profile', function () {
    return View::make('profile');
}))->before('auth');

Route::get('reg', array('as' => 'reg', function () {
    return View::make('reg');
}))->before('guest');

Route::get('search', array('as' => 'search', function () {
    return View::make('search');
}))->before('auth');

Route::post('search', function () {
    return View::make('search');
})->before('auth');