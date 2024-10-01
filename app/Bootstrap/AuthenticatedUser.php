<?php

namespace App\Bootstrap;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class AuthenticatedUser {
	
	public static function getAuthenticatedUser(): User|null {
		// If MySQL database is offline, use sqlite instead
		if(Config::get("is_offline")) {
			$user = (new User)->setConnection("sqlite")->find(Auth::user()->id);
		} else {
			$user = Auth::user();
		}
		return $user;
	}
}