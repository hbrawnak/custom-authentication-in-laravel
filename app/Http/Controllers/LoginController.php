<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function postLogin(Request $request)
    {
        try{
            if (Sentinel::authenticate($request->all()))
            {
                $slug = Sentinel::getuser()->roles()->first()->slug;

                if ($slug == 'admin')
                {
                    return redirect('/earnings');
                }
                elseif ($slug == 'manager')
                {
                    return redirect('/tasks');
                }
            }
            else{
                return redirect()->back()->with(['error' => 'Wrong Credentials.']);
            }
        } catch (ThrottlingException $e)
        {
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "You are banned for $delay seconds"]);

        } catch (NotActivatedException $e)
        {
            return redirect()->back()->with(['error' => 'Your account is not activated']);
        }
    }

    public function logout()
    {
        Sentinel::logout();

        return redirect('/login');
    }
}
