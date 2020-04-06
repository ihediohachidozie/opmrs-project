<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Practitioner;
use App\Medpractitioner;

class PractitionerRegisterController extends Controller
{
    //
    protected $redirectTo = 'practitioner.dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:practitioner');
    }

    public function showRegistrationForm()
    {
        return view('auth.practitioner-register');
    }
    public function register(Request $request)
    {
        $data = request()->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'sometimes|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|unique:practitioner',
            'email' => 'required|email|unique:practitioner',
            'national_id' => 'required|numeric|unique:practitioner',
            'profession' => 'required|numeric',
            'license' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $check = Medpractitioner::where(['profession' => $request->profession, 'license' => $request->license])->count();

        if($check == 1)
        {
            $user = Practitioner::create([
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'phone' => $data['phone'],
                'national_id' => $data['national_id'],
                'email' => $data['email'],
                'profession' => $data['profession'],
                'specialty' => $data['specialty'],
                'license' => $data['license'],
                'password' => Hash::make($data['password']),
            ]);

            Auth::guard('practitioner')->login($user);


            return redirect()->intended(route('practitioner.dashboard'));
        }
        return back()->withStatus(__('Invalid License number.'));


    }

}
