<?php

namespace App\Http\Controllers;

use App\consultancy;
use App\practitional;
use DB;
use Illuminate\Http\Request;

class ConsultancyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:practitioner');
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('medicals.index');
        return Consultancy::with('user')->where('status', 0)->select('id', 'user_id', 'created_at')->get();
       // return DB::table('consultancies')->leftJoin('pharmacies', 'consultancies.id', '=', 'pharmacies.consultancy_id')->select('consultancies.*', 'pharmacies.*')->whereNull('pharmacies.drugs')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('medicals.index');
    }

    public function getConsult(){
        return Consultancy::with('user')->orderBy('id', 'DESC')->get();
    }

    public function getUserConsult(){
        return Consultancy::with('user')->where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
    }

    public function physician()
    {
        //
        $consults = Consultancy::with('user')->where('status', 0)->get();

        return view('medicals.doctor', compact('consults'));
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
            'temp' => 'sometimes',
            'bp'=> 'sometimes',
            'pulse' => 'sometimes',
            'weight' => 'sometimes',
            'height' => 'sometimes',
            'nurse_id' => 'sometimes'

        ]);

        Consultancy::create($data);

        return ['message' => 'Patient admitted!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\consultancy  $consultancy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Consultancy::where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\consultancy  $consultancy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $consultancy = Consultancy::with('user')->where('id', $id)->get();
        return view('medicals.edit', compact('consultancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\consultancy  $consultancy
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $consultancy = Consultancy::find($id);

        $consultancy->doctor_id = auth()->id();
        $consultancy->complain = request('complain');
        $consultancy->diagnosis = request('diagnosis');
        $consultancy->symptoms = request('symptoms');
        $consultancy->remarks = request('remarks');
        $consultancy->xcase = request('xcase');

        $consultancy->save();
        return ['message' => 'Data saved!'];
    

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\consultancy  $consultancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(consultancy $consultancy)
    { 
        //
    }

    public function history()
    {

        return view('records/consultancy');        
    }

    public function userhistory()
    {

        return view('medicals/consults', compact('consults'));         
    }

    public function getMed($id)
    {
        return Consultancy::where('user_id', $id)->orderBy('id', 'DESC')->get();
    }

    public function updateStatus($id)
    {
        $consultancy = Consultancy::find($id);
        $consultancy->status = 1;
        $consultancy->update();

        return back();
    }
}
