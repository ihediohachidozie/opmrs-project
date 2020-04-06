<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Hospital;
use App\Practitioner;
use App\Medpractitioner;

class HospitalController extends Controller
{
    //
    protected $redirectTo = 'hospital.dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:hospital')->except('logout');
    }

    public function index()
    {
        return view('blank');
    }

    public function showRegistrationForm()
    {
        return view('auth.hospital-register');
    }

    public function showLoginForm()
    {
        return view('auth.hospital-login');

    }

    public function register(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'othernames' => 'sometimes|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|unique:hospital',
            'email' => 'required|email|unique:hospital',
            'tin' => 'required|string|unique:hospital',
            'state' => 'required|string',
            'lga' => 'required|string',
            'contact_phone' => 'required|string',
            'emg_phone1' => 'required|string',
            'emg_phone2' => 'required|string',
            'postal' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $hospital = Hospital::create([
            'name' => $data['name'],
            'othernames' => $data['othernames'],
            'country' => $data['country'],
            'phone' => $data['phone'],
            'tin' => $data['tin'],
            'email' => $data['email'],
            'state' => $data['state'],
            'lga' => $data['lga'],
            'contact_phone' => $data['contact_phone'],
            'emg_phone1' => $data['emg_phone1'],
            'emg_phone2' => $data['emg_phone2'],
            'postal' => $data['postal'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::guard('hospital')->login($hospital);
       //     return back();

        return redirect()->intended(route('hospital.dashboard'));



    }

}
