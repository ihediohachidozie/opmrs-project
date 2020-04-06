<?php

namespace App\Http\Controllers;
use App\practitional;

use Illuminate\Http\Request;

class PractitionerController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth' => 'verified']);
        $this->middleware('auth:practitioner');
    }
    
    public function index()
    {
        $p = practitional::where('user_id', auth()->id())->pluck('profession');
        return view('dashboard', compact('p'));
    }
}
