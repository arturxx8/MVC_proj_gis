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
            'password2' => Input::get('password2'),
            'name' => Input::get('name'),
            'surname' => Input::get('surname'),
            'patronymic' => Input::get('patronymic'),
            'datebirth' => Input::get('datebirth'),
            'organization' => Input::get('organization'),
            'department' => Input::get('department'),
            'address' => Input::get('address'),
            'telephone' => Input::get('telephone'),
            'secpic' => Input::get('secpic')
        );
        if ($user['login']=='' or $user['password']=='' or $user['name']=='' or $user['surname']=='' or $user['department']=='' or $user['datebirth']==''
            or $user['organization']=='' or $user['secpic']=='' or $user['address']==''){
            return Redirect::back()->with('flash_error','Заполнены не все обязательные поля!');
        }
        if ($user['password']!=$user['password2']){
            return Redirect::back()->with('flash_error','Пароли не совпадают!');
        }
        var_dump($user);
        if (User::Analog($user['login'])!='')
        {
            return Redirect::back()->with('flash_error','Данный логин существует!');
        }
        if(strlen($user['login'])>=12)
        {
            return Redirect::back()->with('flash_error','Логин слишком длинный!');
        }
        $filename = "";
        $extension = "";
        if (Input::hasFile('image')) {
            $allowedext = array("png", "jpg", "jpeg", "gif");
            $photo = Input::file('image');
            $destinationPath = public_path() . '/uploads';
            $filename =User::MaxId()+1 ;
            $extension = $photo->getClientOriginalExtension();
            if (in_array($extension, $allowedext)) {
                $upload_success = Input::file('photo')->move($destinationPath, $filename . '.' . $extension);
            }
        }
        User::create(array(
            'id'=>User::MaxId()+1,
            'barcode'=>User::MaxBarcode()+1,
            'name'=>$user['name'],
            'surname'=>$user['surname'],
            'patronymic'=>$user['patronymic'],
            'datebirth'=>$user['datebirth'],
            'address'=>$user['address'],
            'telephone'=>$user['telephone'],
            'organization'=>Organization::IdOrg($user['organization']),
            'department'=>Department::IdDep($user['department']),
            'url_pic'=> $filename . '.' . $extension,
            'login'=>$user['login'],
            'password'=>Hash::make($user['password'])
        ));
        return Redirect::route('home')->with('flash_notice', 'Вы успешно зарегестрированы!');
    }


}