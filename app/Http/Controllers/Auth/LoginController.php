<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller
{
  public function showLoginForm() {
	  if(Auth::check()) {
		  return redirect()->route('home');
	  }
		return inertia('Auth/Login');
  }
	
	public function showRegisterForm() {
		if(Auth::check()) {
			return redirect()->route('home');
		}
		return inertia('Auth/SignUp');
	}
	
	public function login(Request $request) {
		
		
		// If MySQL database is offline, use sqlite instead
		if(Config::get("is_offline")) {
			config(["database.default" => "sqlite"]);
		}
		
		$credentials = $request->validate([
			'email' => ['required','email'],
			'password' => ['required'],
		]);
		
		if(Auth::attempt($credentials)) {
			$request->session()->regenerate();
			return redirect()->intended();
		}
		
		return back()->withErrors([
			'email' => 'The provided credentials do not match our records.',
		]);
	}
	
	public function register(Request $request) {
		if(Config::get("is_offline")) {
			return back()->withErrors([
				'offline' => 'Due to errors, we are unable to process your request. Try again later.',
			]);
		} else {
			
			
			$attributes = $request->validate([
				"nickname" => ["required", "string", "max:255"],
				"date_of_birth" => ["required", "date", "date_format:Y-m-d"],
				"email" => ["required", "email:rfc,dns", "unique:users"],
				"password" => ["required", "min:6"],
			]);
			
			User::create($attributes);
			
			
			//SQLite
			$sqlite_attributes = $request->validate([
				"nickname" => ["required", "string", "max:255"],
				"date_of_birth" => ["required", "date", "date_format:Y-m-d"],
				"email" => ["required", "email:rfc,dns", "unique:sqlite.users"],
				"password" => ["required", "min:6"],
			]);
			
			(new User)->setConnection("sqlite")->create($sqlite_attributes);
			
			
			//Return to process
			$credentials = [
				"email" => $attributes["email"],
				"password" => $attributes["password"],
			];
			
			if(Auth::attempt($credentials)) {
				$request->session()->regenerate();
			}
			
			return redirect("/");
		}
	}
	
	public function logout() {
		Auth::logout();
		
		return redirect()->route("login");
	}
}
