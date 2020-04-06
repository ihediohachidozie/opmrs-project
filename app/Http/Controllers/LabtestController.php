<?php

namespace App\Http\Controllers;

use App\labtest;
use App\User;
use App\practitional;
use Illuminate\Http\Request;

class LabtestController extends Controller
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

        return view('lab.index');
    }

    public function getLabs()
    {
        return Labtest::whereNull('test_result')->get();
    }
    public function getLab($id)
    {
        return Labtest::where('consultancy_id', $id)->get();
    }

    public function allUsers()
    {
        return User::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $labtest = new labtest();

        $labtest->consultancy_id = request('consultancy_id');
        $labtest->test_sample = request('test_sample');
        $labtest->test_required = request('test_required');
        $labtest->doctor_id = request('doctor_id');
        $labtest->user_id = request('user_id');

        $labtest->save();

        return ['message' => 'Laboratory Test sent!'];


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\labtest  $labtest
     * @return \Illuminate\Http\Response
     */
    public function show(labtest $labtest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\labtest  $labtest
     * @return \Illuminate\Http\Response
     */
    public function edit(labtest $labtest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\labtest  $labtest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $labtest = Labtest::find($id);
        $labtest->lab_tech_id = auth()->id();
        $labtest->test_result = request('test_result');

        $labtest->update();

        return ['message' => 'Laboratory Test Result sent!'];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\labtest  $labtest
     * @return \Illuminate\Http\Response
     */
    public function destroy(labtest $labtest)
    {
        //
    }
}
