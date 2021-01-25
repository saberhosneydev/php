<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.settings', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth()->user();
        if ($request->has('2FAEnable')) {
            $user['_2FA'] = true;
        }else {
            $user['_2FA'] = false;
            $user['_2FAMethod'] = NULL;
        }
        if ($request->has('2FA')) {
            $user['_2FA'] = true;
            switch ($request['2FA']) {
                case 'email':
                    $data = [$request['2FA'], $user->email];
                    $user['_2FAMethod'] = json_encode($data);
                    break;
                case 'phone':
                    $data = [$request['2FA'], $request['phoneNumber']];
                    $user['_2FAMethod'] = json_encode($data);
                    break;
            }
        }
        $user->save();
        return redirect()->route('account.settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
