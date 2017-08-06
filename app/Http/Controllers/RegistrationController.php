<?php

namespace App\Http\Controllers;

use Sentinel;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register()
    {
        return view('authentication.register');
    }

    public function postRegister(Request $request)
    {
        $user = Sentinel::registerAndActivate($request->all());
        return redirect('/');
    }
}
