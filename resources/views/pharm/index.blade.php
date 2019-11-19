@extends('layouts.app')
@section('content')
    
    <div id="pharm" class="container-fluid">

        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                      <button class="btn btn-success float-right" @click="reLoad()">Refresh List</button>
                 {{--  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#doctor"> Doctor </button> --}}
                </h5>
                
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <th>Date</th>
                        <th>Prescriptions</th>
                        <th>Name</th>
                        <th> Action</th>

                    </thead>
                    <tbody>
                        <tr v-for="pharm in pharms">
                            <td v-text="pharm.created_at"></td>
                            <td v-text="pharm.prescription"></td>
                            <td>@{{getName(pharm.user_id) }}</td>
                            <td ><button class="btn btn-primary btn-sm btn-block" @click="getPharm(pharm)">Issue Drugs</button></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
        <!-- modal large doctor's page-->
        <div class="modal fade" id="drugs" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Patient's Drug Prescription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="message">
                            <strong>@{{ message }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Patient:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="patient"  disabled>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Doctor:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="doctor" disabled>
                                    </div>
                                </div>
    

                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold">Prescriptions:</span>
                                        </div>
                                        <textarea id="" cols="30" rows="3" name="diagnosis" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="prescription" disabled ></textarea>  
 
                                    </div>
                                             
                                </div>

                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Drugs</span>
                                        </div>
                                        <textarea id="" cols="30" rows="3" name="diagnosis" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="drugs"></textarea>  
 
                                    </div>          
                                </div>

                            </div>
                        </form>
 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" @click="onSubmit()" :disabled="bool">Save</button>
                    </div>
                </div>
            </div>
        </div>
     
     
    </div>
    <script src="{{ asset('js/pharm.js')}}"></script>
@endsection