<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeasionsController extends Controller
{
	public function index() {
		return view('seasions.login');
	}
    public function create() {
        $credentials = [
            'name' => request('name'),
            'password' => request('password')
        ];
        if (! Auth::attempt($credentials)) {
            return back();
        }
        return redirect('/');
    }
    public function destroy() {
    	auth()->logout();

    	return redirect('/');
    }
}
