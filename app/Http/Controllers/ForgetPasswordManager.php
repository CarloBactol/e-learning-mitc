<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordManager extends Controller
{
    public function forgetpassword()
    {
        return view('forget-password');
    }

    public function forgetpasswordPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);


        Mail::send("email.forget-password", ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route('forget-password'))->with('status', 'We have send an email to reset password');
    }
}
