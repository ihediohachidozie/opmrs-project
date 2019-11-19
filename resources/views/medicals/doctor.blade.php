@extends('layouts.app')
@section('content')
    
    <div id="consult" class="container-fluid">
        <!-- Page Heading -->
        <div class="card">
            <div class="card-header" id="headingOne">

                
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped " id="myTable">
                    <thead>
                        <th>Date</th>
                        <th  class="text-center">National ID</th>
                        <th>Name</th>
                        <th colspan="2" class="text-center"> Action</th>

                    </thead>
                    <tbody>
                        @foreach ($consults as $consult)
                            <tr>
                                <td>{{ $consult->created_at->format('d-m-Y') }}</td>
                                <td class="text-center">{{ $consult->user->national_id }}</td>
                                <td>{{ $consult->user->firstname }}{{ ' '}}{{ $consult->user->lastname}}</td>
                                <td class="text-center"> <a class="btn btn-primary btn-block btn-sm" href="{{ route('Consultancy.edit', $consult->id) }}" >Consult</a> </td>
                                <td class="text-center"> 
                                    <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#discharge" >Discharge Patient</a> 
                                    <!-- Discharge Modal-->
                                    <div class="modal fade" id="discharge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Attention User!</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-danger">Are you sure u want discharge this Patient?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="{{ route('discharge', $consult->id) }}" onclick="event.preventDefault();
                                                        document.getElementById('discharge-patient').submit();">
                                                    Discharge
                                                    </a>
                                                    <form id="discharge-patient" action="{{ route('discharge', $consult->id) }}" method="post" style="display: none;">
                                                        @method('PuT')
                                                        @csrf
                                                                                    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>                        
                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>


{{--         <!-- modal large patient's medical condition-->
        <div class="modal fade" id="nurse" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Patient's Current Condition</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="user">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="small font-weight-bold">National ID:</label>
                                    <input type="text" class="form-control form-control-user" v-model="nin" @blur="getInfo()">
                                        
                                </div>
                                <div class="col-sm-8">
                                    <label for="" class="small font-weight-bold">Full Name:</label>
                                    <input type="text" class="form-control form-control-user" v-model="name" disabled>
                                        
                                </div> 

                            </div>                            
                            <div class="form-group row"> 
                                <div class="col-sm-3">
                                    <label for="" class="small font-weight-bold">Temperature:</label>
                                    <input type="text" class="form-control form-control-user" v-model="temp">
                                            
                                </div> 
                                <div class="col-sm-3">
                                    <label for="" class="small font-weight-bold">Blood Pressure:</label>
                                    <input type="text" class="form-control form-control-user" v-model="bp">
                                            
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="small font-weight-bold">Pulse:</label>
                                    <input type="text" class="form-control form-control-user" v-model="pulse">             
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="small font-weight-bold">Blood Sugar Level:</label>
                                    <input type="text" class="form-control form-control-user" v-model="bsl">             
                                </div>
                            </div>
                            <div class="form-group row">  

                                <div class="col-sm-4">
                                    <label for="" class="small font-weight-bold">Weight:</label>
                                    <input type="text" class="form-control form-control-user" v-model="weight">             
                                </div>
                                <div class="col-sm-4">
                                    <label for="" class="small font-weight-bold">Height:</label>
                                    <input type="text" class="form-control form-control-user" v-model="height" @blur="onBMI()">             
                                </div>
                                <div class="col-sm-4">
                                    <label for="" class="small font-weight-bold">Body Mass Index: </label>
                                    <input type="text" class="form-control form-control-user" v-model="bmi" disabled>             
                                </div>
                            </div>                         
    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="clear()">Cancel</button>
                            <button type="button" class="btn btn-primary" @click="onSubmit()">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal large doctor's page-->
        <div class="modal fade" id="doctor" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Doctor's Consultation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="" class="font-weight-bold">Case Information: </label>
                                    <div class="form-check-inline mt-0">
                                        <div class="custom-control custom-radio">
                                            <input name="case" class="custom-control-input" id="customRadio6" type="radio" value="0">
                                            <label class="custom-control-label" for="customRadio6">Acute</label>
                                        </div>

                                    </div>
                                    <div class="form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input name="case" class="custom-control-input" id="customRadio7" type="radio" value="1">
                                            <label class="custom-control-label" for="customRadio7">Chronic</label>
                                        </div>
                                    </div>
                                    <div class="form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input name="case" class="custom-control-input" id="customRadio8" type="radio" value="2">
                                            <label class="custom-control-label" for="customRadio8">Pre-exiting</label>
                                        </div>
                                    </div>
                                    <div class="form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input name="case" class="custom-control-input" id="customRadio9" type="radio" value="3">
                                            <label class="custom-control-label" for="customRadio9">Injury</label>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Paient's Complain:</label>
                                    <textarea id="" cols="30" rows="3" name="diagnosis" class="form-control" v-model="diagnosis" ></textarea>           
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Symptoms/Signs:</label>
                                    <textarea id="" cols="30" rows="3" name="aetiology" class="form-control" ></textarea>                 
                                </div>
                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Diagnosis:</label>
                                    <textarea id="" cols="30" rows="3" name="symptoms" class="form-control" ></textarea>           
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Laboratory:</label>
                                    <textarea id="" cols="30" rows="3" name="findings" class="form-control" ></textarea>                 
                                </div>
                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-12">
                                    <label for="" class="small font-weight-bold">Remarks:</label>
                                    <textarea id="" cols="30" rows="3" name="remarks" class="form-control" ></textarea>           
                                </div>
                            </div>
                        </form>
 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <script src="{{ asset('js/consult.js')}}"></script>
@endsection  