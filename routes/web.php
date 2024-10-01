<?php

use App\Bootstrap\AuthenticatedUser;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/sign_up', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/sign_up', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');


Route::middleware('auth')->group(function () {
	Route::get('/', function () {
		$nickname = AuthenticatedUser::getAuthenticatedUser()->nickname;
		return inertia('Home', [
			'nickname' => $nickname
		]);
	})->name("home");
	
	Route::get("/profile",[ProfileController::class, 'edit']);
	Route::patch("/profile",[ProfileController::class, 'update']);
});
