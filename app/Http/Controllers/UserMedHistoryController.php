<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultancy;
use App\User;
use App\Practitioner;
use App\labtest;
use App\pharmacy;

class UserMedHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userMedHistory(){
        // get patient medical history
        return Consultancy::with('user')->where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
    }

    public function medPractitioners()
    {
        // get all medical practitioners ..
        return Practitioner::get();
    }

    public function labTests($id)
    {
        // get lab tests for a patient
        return Labtest::where('consultancy_id', $id)->get();
    }
    public function getDrugs($id)
    {
        // get drugs dispensed for a patient

        return Pharmacy::where('consultancy_id', $id)->get();
    }

    public function userhistory()
    {
        // load patient medical history page
        return view('medicals/consults');         
    }
}
