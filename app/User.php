<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
	protected $hidden = ['password'];

	protected $fillable = ['first_name', 'last_name', 'email', 'password', 'city', 'state'];

    public function allUsers(){
    	return self::all();
    }

    public function saveUser(){
    	$input = Input::all();
    	$input['password']=Hash::make($input['password']);
    	$user = new User();
    	$user->fill($input);
    	$user->save();
    	return $user;
    }

    public function getUser($id){
    	$user = self::find($id);
    	if(is_null($user)){
    		return false;
    	}
    	return $user;
    }

    public function updateUser($id){
    	$user = self::find($id);
    	if (is_null($user)){
    		return false;
    	}
    	$input = Input::all();
    	if(isset($input['password'])){
    		$input['password']=Hash::make($input['password']);
    	}    	
    	$user->fill($input);
    	$user->save();
    	return $user;	
    }

    public function deleteUser($id){
    	$user = self::find($id);
    	if(is_null($user)){
    		return false;
    	}
    	return $user->delete();
    }
}