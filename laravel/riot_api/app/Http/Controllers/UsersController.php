<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class UsersController extends Controller
{
    public function index() {
    	return view('create');
    }
    public function store() {
    	$user = new User;

    	$user->name = request('name');
    	$user->position  = request('position');
    	$user->rank = request('rank');

    	$user->save();

    	return redirect('/');
    }
    public function home() {
    	$users = User::get()->all();
    	return view('home', compact('users'));

    }
}
