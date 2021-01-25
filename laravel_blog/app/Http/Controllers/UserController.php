<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// use Twilio\Rest\Client;

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
        $user = Auth()->user();
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
        if ($request->has('phoneVerified')) {
            if ($request->phoneVerified == "EnableTwoFactorAuth") {
                $user->TwoFactorAuth = "phone";
                $user->save();
            } else {
                $user->TwoFactorAuth = null;
                $user->save();
            }
        }
        if ($request->has('newEmail')) {
            $user->email = $request->newEmail;
            $user->save();
        }
        if ($request->has('currentPassword')) {
            if ($user->password == Hash::make($request->currentPassword) && $request->newPassword == $request->confirmPassword) {
                $user->password = Hash::make($request->newPassword);
                $user->save();
            } else {
                return redirect()->route('account.settings')->with('status', 'Your current password and/or new/confirm password doesnt match');
            }
        }
        if ($request->has('newPhoneNumber')) {
            $user->phone_number = $request->newPhoneNumber;
            $user->TwoFactorAuth = null;
            $user->phoneVerified = false;
            $user->save();
        }
        return redirect()->route('account.settings')->with('status', 'Data changed successfully');
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
    public function verifyPhone(Request $request)
    {
        //Validate the number
        $validator = Validator::make($request->all(), [
            'phone_number' => ['numeric', 'required'],
        ]);
        if ($validator->fails()) {
            return json_encode(['status' => "error", 'message' => 'Not a valid number']);
        }
        //Send a code to the user
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($sid, $token);
        $verification = $twilio->verify->v2->services($verify_sid)
            ->verifications
            ->create($request->phone_number, "sms");
        return json_encode(['status' => "success", 'message' => 'the code has been sent']);
    }
    public function verifyVerificationCode(Request $request)
    {
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($sid, $token);
        $verification_check = $twilio->verify->v2->services($verify_sid)
            ->verificationChecks
            ->create($request->verification_code, // code
                ["to" => $request->phone_number]
            );
        if ($verification_check->valid) {
            $user = Auth()->user();
            $user->phoneVerified = true;
            $user->save();
            return json_encode(['status' => "success", 'message' => 'the code has been sent']);
        } else {
            return json_encode(['status' => "error", 'message' => 'Invalid verification code']);
        }

    }

}
