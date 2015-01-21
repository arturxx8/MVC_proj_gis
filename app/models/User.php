<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reader';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $fillable = array('login', 'address', 'password', 'barcode','surname','name','patronymic','datebirth','organization','department','position','telephone','url_pic','id');

	protected $hidden = array('password', 'remember_token');
	static function Analog($login)
	{
		$users = DB::table('reader')->where('login','=', $login)->count();
		return $users;
	}
	static function MaxId()
	{
		$roles = DB::table('reader')->lists('id');
		return max($roles);
	}
	static function MaxBarcode()
	{
		$roles = DB::table('reader')->lists('barcode');
		return max($roles);
	}
}
