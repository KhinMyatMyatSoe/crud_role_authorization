<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // return view('user.user');
        if(Auth::user()->usertype === 1  ){
            return view('admin.admin_profile');
            // return route('admin_profile.index');
        }elseif(Auth::user()->usertype === 2){
            // return route('customer_profile.index');
            return view('user.user_profile');
        }
    }
}