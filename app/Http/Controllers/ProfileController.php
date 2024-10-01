<?php

namespace App\Http\Controllers;

use App\Bootstrap\AuthenticatedUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class ProfileController extends Controller
{
	public function edit() {
		$user = AuthenticatedUser::getAuthenticatedUser();
		
		//debug
		return inertia("Profile/Edit", [
			"user" => [
				"nickname" => $user->nickname,
				"date_of_birth" => date("Y-m-d",strtotime($user->date_of_birth)),
				"email" => $user->email,
			]
		]);
	}
	
  public function update(Request $request) {
	  if(Config::get("is_offline")) {
		  return back()->withErrors([
			  'offline' => 'Due to errors, we are unable to process your request. Try again later.',
		  ]);
	  }
		
	  $attributes = [];
		$mysql_user = (new User)->setConnection("mysql")->find(Auth::user()->id);
		$sqlite_user = (new User)->setConnection("sqlite")->find(Auth::user()->id);
		
		if($request->get('nickname')) {
			$nickname = $request->validate([ "nickname" => ["required", "string", "max:255"] ])["nickname"];
			if($mysql_user->nickname != $nickname) {
				$attributes["nickname"] = $nickname;
			}
		}
	  if($request->get('date_of_birth')) {
			$date_of_birth = $request->validate([ "date_of_birth" => ["required", "date", "date_format:Y-m-d"] ])["date_of_birth"];
		  if($mysql_user->date_of_birth != $date_of_birth) {
			  $attributes["date_of_birth"] = $date_of_birth;
		  }
	  }
	  if($request->get('email')) {
		  $email = $request->validate([ "email" => ["required", "email:rfc,dns", "exists:users"] ])["email"];
		  if($mysql_user->email != $email) {
			  $attributes["email"] = $email;
		  }
	  }
	  if($request->get('password')) {
		  $attributes["password"] = $request->validate([ "password" => ["required", "min:6"] ])["password"];
	  }
	  
	  $mysql_user->update($attributes);
	  $sqlite_user->update($attributes);
		
	  $request->session()->regenerate();
		
	  return redirect("/");
  }
}
