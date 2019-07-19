<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function welcome() {
        $userM = new User;
        $userId = auth()->id();
        $user  = $userM->find($userId);
        return view('welcome', compact('user'));
    }
}
