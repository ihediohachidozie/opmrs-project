@extends('layouts.app1')
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
                        <th >Nurse's Name</th>
                        <th >Doctor's Name</th>
                        <th class="text-center"> Action</th>

                    </thead>
                    <tbody>
                        <tr v-for="consult in consults">
                            <td v-text="consult.created_at"></td>
                            <td>@{{ getName(consult.nurse_id) }}</td>
                            <td>@{{ getName(consult.doctor_id) }}</td>
                            <td><button class="btn btn-primary btn-block btn-sm" @click="viewInfo(consult)">view</button></td>

                        </tr>


                    </tbody>
                </table>

            </div>

        </div>

        <!-- modal large patient's medical condition-->
        <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Patient's Medical Report on @{{created}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="user">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">BMI:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="bmi" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Temperature:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="temp" disabled>
                                    </div>                        
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Pulse:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="pulse" disabled>
                                    </div>                        
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Blood Pressure:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="bp" disabled>
                                    </div>                        
                                </div>
                                <hr>
                            </div>
                            <div class="form-group">
                                <label for="" class="font-weight-bold text-danger">Physician's Report</label>
                            </div>
                            <div class="form-group row">  
                                
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Paient's Complain:</label>
                                    <textarea cols="30" rows="3" class="form-control" v-model="complain" disabled></textarea>           
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Symptoms/Signs:</label>
                                    <textarea cols="30" rows="3" class="form-control" v-model="symptoms" disabled></textarea>                 
                                </div>
                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Diagnosis:</label>
                                    <textarea cols="30" rows="3" class="form-control" v-model="diagnosis" disabled></textarea>           
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Remarks:</label>
                                    <textarea cols="30" rows="3" class="form-control"v-model="remarks" disabled ></textarea>                
                                </div>
                            </div>                         
                            <div class="form-group row"> 
                                <div class="col-sm-12">
                                    <label for="" class="font-weight-bold text-danger">laboratory Report</label>
                                    <table class="table table-striped">
                                        <thead>
                                            <th>Sample</th>
                                            <th>Test Required</th>
                                            <th>Result</th>
                                            <th>Lab Tech</th>
                                        </thead>
                                        <tbody>
                                            <tr v-for="test in tests">
                                                <td v-text="test.test_sample"></td>
                                                <td v-text="test.test_required"></td>
                                                <td v-text="test.test_result"></td>
                                                 <td>@{{getName(test.lab_tech_id)}}</td>

                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Prescriptions:</label>
                                    <textarea id="" cols="30" rows="3" name="findings" v-model="prescriptions" class="form-control" disabled></textarea>                 
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Drugs:</label>
                                    <textarea id="" cols="30" rows="3" name="findings" v-model="drugs" class="form-control" disabled></textarea>                 
                                </div>

                            </div>                         
    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" >Close</button>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <script src="{{ asset('js/userhistory.js')}}"></script>
@endsection