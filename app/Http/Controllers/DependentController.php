<?php

namespace App\Http\Controllers;

use App\dependent;
use App\User;
use App\practitional;
use Illuminate\Http\Request;

class DependentController extends Controller
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
        return Dependent::where('user_id', auth()->id())->select('id', 'name', 'dob', 'relationship')->get();
       // return view('dependents.index');  
    }

    public function getUser()
    {
        return User::where('id',auth()->id())->select('id')->get();
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
        return view('dependents.index', compact('p'));
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
            'name' => 'required',
            'dob' => 'required',
            'relationship'=> 'required',
            'user_id' => 'required'
        ]);

        Dependent::create($data);

        return ['message' => 'Dependent data saved!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function show(dependent $dependent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function edit(dependent $dependent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dependent $dependent)
    {
        //
        $dependent = Dependent::find(request('id'));

        $data = request()->validate([
            'name' => 'required',
            'dob' => 'required',
            'relationship'=> 'required',
            'user_id' => 'required'
        ]);

        if($dependent->update($data))
        {
            return ['message' => 'Dependent data upated!'];
        }else{
            return ['message' => 'something is wrong!'];
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dependent = Dependent::find($id);

        if($dependent->delete())
        {
            return ['message' => 'Dependent Deleted!'];
        }else{
            return ['message' => 'something is wrong!'];
        }

        
    }
}
