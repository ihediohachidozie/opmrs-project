@extends('layouts.app')
@section('content')
    
    <div id="consult" class="container-fluid">
        <!-- Page Heading -->
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#nurse">Admit Patient</button>
                   {{--  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#doctor"> Doctor </button> --}}
                </h5>
                
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>Date</th>
                        <th>National ID</th>
                        <th>Name</th>
                        <th> Status</th>

                    </thead>
                    <tbody>
                        <tr v-for="consult in consults">
                            <td v-text="consult.created_at"></td>
                            <td v-text="consult.user.national_id"></td>
                            <td v-text="consult.user.firstname + ' ' + consult.user.lastname"></td>
                            <td >Waiting for a doctor</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>

        <!-- modal large patient's medical condition-->
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

    </div>  
    <script src="{{ asset('js/consult.js')}}"></script>
@endsection