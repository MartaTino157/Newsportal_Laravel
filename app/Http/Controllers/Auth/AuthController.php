<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth; //предаставления
use Hash; //кодирование пароля

class AuthController extends Controller
{
    //register: form->register(storeUser)
    public function register()
    {
    	return view('auth.register');
    }

    public function storeUser(Request $resquest)
    {
    	$resquest->validate([
    		'name' => 'required|string|max:225',
    		'email' => 'required|string|email|max:225|unique:users',
    		'password' => 'required|string|min:8|confirmed',
    		'password_confirmation' => 'required',
    	]);
    	//запрос на добавление пользователя
    	User::create ([
    		'name' => $resquest->name,
    		'email' => $resquest->email,
    		'password' => Hash::make($resquest->password),
    	]);
    	return redirect('dashboard');
    }
    //login: form -> request authenricate
    public function login()
    {
    	return view('auth.login');
    }
    public function authenticate(Request $resquest)
    {
    	$resquest->validate([
    		'email' => 'required|string|email',
    		'password' => 'required|string',
    	]);
    	$credentials = $resquest->only('email', 'password');
    	if(Auth::attempt($credentials)){
    		return redirect()->intended('dashboard');
    	}
    	return redirect('login')->with('error', 'Упс! Вы ввели неверные учетные данные');
    }
    //logout
    public function logout() {
    	Auth::logout();
    	return redirect('login');
    } 
    //dashboard view
    public function dashboard() {
    	return view('dashboard');
    } 
}

