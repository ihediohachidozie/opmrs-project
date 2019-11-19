<?php

namespace App\Http\Controllers;
use App\practitional;


use Illuminate\Http\Request;

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
    public function dashboard()
    {
        $p = practitional::where('user_id', auth()->id())->pluck('profession');

        //Config::write('p', $p);

        return view('dashboard', compact('p'));
    }
    public function blank()
    {
        return view('blank');
    }

}
