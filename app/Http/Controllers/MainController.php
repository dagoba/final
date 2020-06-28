<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;

class MainController extends Controller
{
    public function userMain()
    {
        //$users = User::with('roles')->where('roles','doctor')->get();
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->get();
        return view('user', ['users'=> $users]);
        
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


