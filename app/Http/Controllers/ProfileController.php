<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\practitional;
use DB;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $p = practitional::where('user_id', auth()->id())->pluck('profession');
        return view('proflie', compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $p = practitional::where('user_id', auth()->id())->pluck('profession');
        $profile = new Profile();
     
        return view('profile.create', compact('profile', 'p'));
    }

    public function userDetails()
    {
        return User::select('id', 'firstname', 'lastname')->where('id', auth()->id())->get();
    }
    
    public function getID()
    {
        return Profile::where('user_id', auth()->id())->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user = User::find(auth()->id());

        $userdata = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        $data = request()->validate([
            'user_id' => 'required',
            'dob' => 'sometimes',
            'gender' => 'sometimes',
            'address'=> 'sometimes',
            'env_allergies'=> 'sometimes',
            'food_allergies'=> 'sometimes',
            'drug_allergies'=> 'sometimes',
            'relationship'=> 'sometimes',
            'emg_name'=> 'sometimes',
            'emg_phone'=> 'sometimes',
            'phone'=> 'sometimes',
            'blood_group'=> 'sometimes',
            'marital_status'=> 'sometimes',
            'religion'=> 'sometimes',
        ]);

        $user->update($userdata);

        Profile::create($data);

        return ['message' => 'Personal data saved!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Profile::with('user')->where('user_id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
        $user = User::find(auth()->id());
        $profile = Profile::find(request('id'));

        $userdata = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        $data = request()->validate([
            'user_id' => 'required',
            'dob' => 'sometimes',
            'gender' => 'sometimes',
            'address'=> 'sometimes',
            'env_allergies'=> 'sometimes',
            'food_allergies'=> 'sometimes',
            'drug_allergies'=> 'sometimes',
            'relationship'=> 'sometimes',
            'emg_name'=> 'sometimes',
            'emg_phone'=> 'sometimes',
            'phone'=> 'sometimes',
            'blood_group'=> 'sometimes',
            'marital_status'=> 'sometimes',
            'religion'=> 'sometimes',
        ]);

        $user->update($userdata);

        if($profile->update($data))
        {
            return ['message' => 'Personal data updated!'];
        }
        else
        {
            return ['message' => 'Something went wrong!'];
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
