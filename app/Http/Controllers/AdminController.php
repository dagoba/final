<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin', ['users'=> $users]);
    }
/**
 * giving admin permissions to user
 *
 * @return void
 */
    public function giveAdmin($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $user->roles()->attach($adminRole->id);

        return redirect('/admin');
    }
/**
 * remooving admin permissions
 *
 * @return void
 */
    public function removeAdmin($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $user->roles()->detach($adminRole->id);

        return redirect('/admin');
    }
}
