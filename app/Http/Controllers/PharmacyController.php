<?php

namespace App\Http\Controllers;

use App\pharmacy;
use App\practitional;
use App\consultancy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $p = practitional::where('user_id', auth()->id())->pluck('profession');
        return view('pharm.index', \compact('p'));
    }
    public function getPharms()
    {
        return Pharmacy::whereNull('drugs')->get();
    }
    public function getPham($id)
    {
        return Pharmacy::where('consultancy_id', $id)->get();
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

        $pharmacy = new pharmacy();

        $pharmacy->consultancy_id = request('consultancy_id');
        $pharmacy->prescription = request('prescription');
        $pharmacy->doctor_id = request('doctor_id');
        $pharmacy->user_id = request('user_id');
  
        $pharmacy->save();

        return ['message' => 'Drugs requested!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(pharmacy $pharmacy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit(pharmacy $pharmacy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pharmacy = pharmacy::find($id);

        $pharmacy->pharmacist = auth()->id();
        $pharmacy->drugs = request('drugs');

        $pharmacy->update();

        return ['message' => 'Drugs Issued!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(pharmacy $pharmacy)
    {
        //
    }
}
