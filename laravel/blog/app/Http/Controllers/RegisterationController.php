<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterationController extends Controller
{
    public function index() {
    	return view('seasions.rindex');
    }
    public function create() {
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    	]);

    	// $user = User::create(request(['name', 'email', 'password']));

    	// auth()->login($user);

        $user = new User;

        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));

        $user->save();

    	return redirect('/');
    }
}
