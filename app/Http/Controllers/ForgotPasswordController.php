<?php

namespace App\Http\Controllers;

use App\User;
use Mail;
use Reminder;
use Sentinel;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('authentication.forgot-password');
    }

    public function postForgotPassword(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        $sentinelUser = Sentinel::findById($user->id);

        if (count($user) == 0)
        {
            return redirect()->back()->with(['success' => 'Password reset code has been sent to your email']);
        }
        $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);

        $this->sendEmail($user, $reminder->code);

        return redirect()->back()->with(['success' => 'Password reset code has been sent to your email']);
    }

    private function sendEmail($user, $code)
    {
        Mail::send('email.forgot-password', [
            'user' => $user,
            'code' => $code
        ], function ($message) use($user) {
            $message->to($user->email);
            $message->subject("Hello $user->first_name, reset your password.");
        });
    }
}
