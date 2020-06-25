<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\User;
use App\Role;
use App\UserRole;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'chooseRole' => 'required',
        ]);

        $saveRole = new UserRole;

        $user = UserRole::where('user_id',$request->user()->id)->update(['role_id' => $request->chooseRole]);

        Session::flash('success', "Role choosed successfully!");

        return redirect()->route('user');
    }
}
