<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MainController extends Controller
{
    public function userMain()
    {
        return view('user');
    }

    public function adminMain()
    {
        $userRoles = Auth::user()->roles->pluck('name');

        if (!$userRoles->contains('admin')) {
            return redirect('/permission-denied');
        }
        
        return view('admin');
    }

    public function permissionDenied()
    {
        return view('nopermission');
    }
}


