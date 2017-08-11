<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
class PostController extends Controller
{
    public function store(Request $request)
    {
        $user = Sentinel::getUser();

        if ($user->hasAccess('post.create'))
        {
            return $request->all();
        } else
        {
            return abort(403, 'Unauthorized Action');
        }

    }
}
