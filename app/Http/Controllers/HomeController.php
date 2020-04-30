<?php

namespace App\Http\Controllers;

use App\Milk;
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
        if(Auth::user()->role == 0)
            return view('role.admin');
        else if(Auth::user()->role == 1)
            return  redirect()->route('histories.index');
        else{
            return redirect()->route('milks.index');
        }
    }
    public function addUser(){

    }
}
