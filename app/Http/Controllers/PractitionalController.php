<?php

namespace App\Http\Controllers;

use App\practitional;
use App\User;
use Illuminate\Http\Request;

class PractitionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:practitioner');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Practitional::with('user')->select('id', 'user_id', 'license', 'valid', 'profession')->get();
    }

    public function userInfo($id)
    {
        return User::select('id', 'firstname', 'lastname')->where('national_id', $id)->get();
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
        return view('practitionals.create', compact('p'));
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
        $data = request()->validate([
            'user_id' => 'required',
            'license' => 'required',
            'valid'=> 'required',
            'profession' => 'required'
        ]);

        Practitional::create($data);

        return ['message' => 'Practitioner data saved!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\practitional  $practitional
     * @return \Illuminate\Http\Response
     */
    public function show(practitional $practitional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\practitional  $practitional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return Practitional::with('user')->where('user_id', $id)->select('id', 'user_id', 'license', 'valid', 'profession')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\practitional  $practitional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, practitional $practitional)
    {
        //
        $practitional = Practitional::find(request('id'));

        $data = request()->validate([
            'user_id' => 'required',
            'license' => 'required',
            'valid'=> 'required',
            'profession' => 'required'
        ]);

        if($practitional->update($data))
        {
            return ['message' => 'Practitioner data upated!'];
        }else{
            return ['message' => 'something is wrong!'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\practitional  $practitional
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $practitional = Practitional::find($id);

        if($practitional->delete())
        {
            return ['message' => 'Practitioner Deleted!'];
        }else{
            return ['message' => 'something is wrong!'];
        }
    }
}
