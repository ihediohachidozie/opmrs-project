@extends('layouts.app')
@section('content')
    
    <div id="profile" class="container-fluid">
        <!-- Page Heading -->
        <form class="user" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-2">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                        </div>
                    
                    
                        <div class="card-body">
                            
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <div class="col-sm-3 mb-sm-0">
                                    <label for="" class="small font-weight-bold">First Name</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="firstname" v-model="firstname" >
                                    
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="small font-weight-bold">Last Name</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"  name="lastname" v-model="lastname" >
                                    
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="small font-weight-bold">Date of Birth</label>
                                    <input type="date" class="form-control form-control-user" id="exampleLastName"  name="DOB" v-model="dob">
                                    
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="small font-weight-bold">Gender</label> <br>

                                    <div class="form-check-inline ">
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="gender" class="custom-control-input" id="customRadio6" type="radio"  v-model="gender" :value="0">
                                            <label class="custom-control-label" for="customRadio6">Male</label>
                                        </div>

                                    </div>
                                    <div class="form-check-inline">
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="gender" class="custom-control-input" id="customRadio7" type="radio" v-model="gender" :value="1">
                                            <label class="custom-control-label" for="customRadio7">Female</label>
                                        </div>
                                    </div>
                                
                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Home Address</label>
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="address" v-model="address">
                                    
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Phone Number</label>
                                    <input type="text" name="phone" id="" class="form-control form-control-user">
                        
                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Office Address</label>
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="address" v-model="address">
                                    
                                </div>
                                <div class="col-sm-6 mb-2 mb-sm-0">
                                    <label for="" class="small font-weight-bold">Educational Qualification</label>
                                    <input type="text" name="qualification" id="" class="form-control form-control-user">
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="small font-weight-bold">Country</label>
                                    <input type="text" name="country" id="" class="form-control form-control-user">
                                </div>
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <label for="" class="small font-weight-bold">State</label>
                                    <input type="text" name="state" id="" class="form-control form-control-user">
                                </div>
                                <div class="col-sm-4">
                                    <label for=""  class="small font-weight-bold">LGA</label>
                                    <input type="text" name="lga" id="" class="form-control form-control-user">
                                </div>

                            </div>
                            <div class="form-group row">

                                <div class="col-sm-4">
                                    <label for="" class="small font-weight-bold">Spoken Language</label>
                                    <select v-model="language" class="form-control" >
                                        <option>Select...</option>
                                        <option v-for="(name, value) in languages" :value="value">
                                            @{{name}}
                                        </option>                                

                                    </select>                            
                                </div>
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <label for="" class="small font-weight-bold">Martial Status</label>
                                    <select v-model="marital_status" class="form-control" >
                                        <option>Select...</option>
                                        <option v-for="(name, value) in martialstatus" :value="value">
                                            @{{name}}
                                        </option>                                

                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for=""  class="small font-weight-bold">Religion</label>
                                    <select class="form-control"v-model="religion"  >
                                        <option>Select...</option>
                                        <option v-for="(name, value) in religions" :value="value">
                                            @{{name}}
                                        </option>
            
                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">  
                                <div class="col-sm-3">
                                    <label for=""  class="small font-weight-bold">Blood Group</label>
                                    <select class="form-control" v-model="blood_group" >
                                        <option>Select...</option>
                                        <option v-for="(name, value) in bloodgroup" :value="value">
                                            @{{name}}
                                        </option>
                                    
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="small font-weight-bold">Food Allergies</label>
                                    <textarea id="" cols="30" rows="3" name="food_allergies" v-model="food_allergies" class="form-control" ></textarea>           
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="small font-weight-bold">Environment Allergies</label>
                                    <textarea id="" cols="30" rows="3" name="env_allergies" v-model="env_allergies" class="form-control" ></textarea>           
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="small font-weight-bold">Drug Allergies</label>
                                    <textarea id="" cols="30" rows="3" name="drug_allergies" v-model="drug_allergies" class="form-control" ></textarea>                 
                                </div>
                            </div>


                            
                        </div>
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Contact(s) in case of Emergency:</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-sm-0">
                                    <label for="" class="small font-weight-bold">Contant Name - I</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="emg_name" v-model="emg_name">
                                
                                </div>
                                <div class="col-sm-3 mb-sm-0">
                                    <label for="" class="small font-weight-bold">Phone</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="emg_phone" v-model="emg_phone">
                                    
                                </div>
                                <div class="col-sm-3 mb-sm-0">
                                    <label for="" class="small font-weight-bold">Relationship</label>
                                    <select class="form-control" v-model="relationship"  >
                                        <option>Select...</option>
                                        <option v-for="(name, value) in relationships" :value="value">
                                            @{{name}}
                                        </option>
                                    
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-sm-0">
                                    <label for="" class="small font-weight-bold">Contact Name - II</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="emg_name" v-model="emg_name">
                                
                                </div>
                                <div class="col-sm-3 mb-sm-0">
                                    <label for="" class="small font-weight-bold">Phone</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="emg_phone" v-model="emg_phone">
                                    
                                </div>
                                <div class="col-sm-3 mb-sm-0">
                                    <label for="" class="small font-weight-bold">Relationship</label>
                                    <select class="form-control" v-model="relationship"  >
                                        <option>Select...</option>
                                        <option v-for="(name, value) in relationships" :value="value">
                                            @{{name}}
                                        </option>
                                    
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-sm-0">
                                    <label for="" class="small font-weight-bold">Contact Name - III</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="emg_name" v-model="emg_name">
                                
                                </div>
                                <div class="col-sm-3 mb-sm-0">
                                    <label for="" class="small font-weight-bold">Phone</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="emg_phone" v-model="emg_phone">
                                    
                                </div>
                                <div class="col-sm-3 mb-sm-0">
                                    <label for="" class="small font-weight-bold">Relationship</label>
                                    <select class="form-control" v-model="relationship"  >
                                        <option>Select...</option>
                                        <option v-for="(name, value) in relationships" :value="value">
                                            @{{name}}
                                        </option>
                                    
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" @click="onUpdate()" class="btn btn-primary btn-user btn-block">
                                    Update
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/profile.js')}}"></script>
@endsection