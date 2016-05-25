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
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function roles()
	{
		return $this->belongsToMany('Role');
	}
	
	public function getRole($id){
		$role = DB::table('users')->where('id', '=', $id)->select('role_id');
		return $role;
	}

	public function getRememberToken()
	{
		return '';
	}

	public function setRememberToken($value)
	{
	}

	public function getRememberTokenName()
	{
		// just anything that's not actually on the model
		return 'trash_attribute';
	}

	/**
	 * Fake attribute setter so that Guard doesn't complain about
	 * a property not existing that it tries to set.
	 *
	 * Does nothing, obviously.
	 */
	public function setTrashAttributeAttribute($value)
	{
	}


}
