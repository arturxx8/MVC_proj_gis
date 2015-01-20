<?php

class LoginController extends BaseController {

    public function showLoginPage()
    {
        return View::make('login');
    }
    public function SignIn()
    {
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
    }
    public function LogOut()
    {
        Auth::logout();

        return Redirect::route('home')
            ->with('flash_notice', 'You are successfully logged out.');
    }

    public function showRegisterPage() {
        return View::make('reg');
    }

    public function Registration() {
        $user = array(
            'login' => Input::get('login'),
            'password' => Input::get('password'),
            'password2' => Input::get('password2')
        );
        if ($user['password']!=$user['password2']){
            return Redirect::back()->with('flash_error','Пароли не совпадают');
        }
        User::create(array(
            'login'=>$user['login'],
            'password'=>Hash::make($user['password']),
            'barcode'=>'1'
        ));
        return Redirect::route('home')->with('flash_notice', 'Вы успешно зарегестрированы!');
    }


}