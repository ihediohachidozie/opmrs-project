<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PractitionerLoginController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth' => 'verified']);

        $this->middleware('guest:practitioner')->except('logout');

    }

    public function index()
    {
        return view('dashboard');
    }
    public function showLoginForm()
    {
        return view('auth.practitioner-login'); 

    }
    public function username()
    {
        $login = request()->input('username');
        
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        request()->merge([$field => $login]);

        return $field;
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        
        // Attempy to login the user in
        if($this->username() == 'email')
        {
            if(Auth::guard('practitioner')->attempt(['email' => $request->username, 'password' => $request->password], $request->remember))
            {
                // if successful, then redirect to their intended location
                return redirect()->intended(route('practitioner.dashboard'));
            }
            
        }
        else{
            //Auth::guard('practitioner')->attempt(['phone' => $request->username, 'password' => $request->password], $request->remember);
            if(Auth::guard('practitioner')->attempt(['phone' => $request->username, 'password' => $request->password], $request->remember))
            {
                // if successful, then redirect to their intended location
                return redirect()->intended(route('practitioner.dashboard'));
            }
        }

        return back()->withStatus(__('Invalid username or password.'));

    }

        /*     public function logout(Request $request)
            {
                Auth::guard('practitioner')->logout;

                return redirect('/');
            } */
}
