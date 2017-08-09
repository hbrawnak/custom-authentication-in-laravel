<?php

namespace App\Http\Controllers;

use App\User;
use Activation;
use Sentinel;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function activate($email, $activationCode)
    {
        $user = User::whereEmail($email)->first();

        //$userSentinel = Sentinel::findById($user->id);

        if (Activation::complete($user, $activationCode))
        {
            return redirect('/login');
        } else {

        }
    }
}
