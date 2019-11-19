@extends('layouts.app')
@section('content')
   
    <div id="doctoredit" class="container-fluid">
        @foreach ($consultancy as $item)
            <form class="user">
                <div class="form-group row text-bold">
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">National ID:</span>
                            </div>
                            <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $item->user->national_id}}" disabled>
                        </div>
                    </div>
            
                    <div class="col-sm-6">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text  bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Full Name:</span>
                            </div>
                            <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $item->user->firstname}} {{' '}} {{ $item->user->lastname}}" disabled>
                        </div>
                        <input type="hidden" id="Id" name="Id" value="{{$item->id}}">
                        <input type="hidden" name="docId" id="docId" value="{{auth()->user()->id}}">
                        <input type="hidden" name="userId" id="userId" value="{{ $item->user_id }}">
                        
                            
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary" @click="getProfile()">Patient's Profile</button>
                    </div>

                   
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">BMI:</span>
                            </div>
                            <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $item->weight / $item->height }}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Temperature:</span>
                            </div>
                            <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $item->temp}}" disabled>
                        </div>                        
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Pulse:</span>
                            </div>
                            <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $item->pulse}}" disabled>
                        </div>                        
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Blood Pressure:</span>
                            </div>
                            <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $item->bp}}" disabled>
                        </div>                        
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Blood Sugar:</span>
                            </div>
                            <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ $item->bsl}}" disabled>
                        </div>                        
                    </div>
                </div>
            </form>
                     
        @endforeach

        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#doctor" aria-expanded="true" aria-controls="collapseOne">
                        Physician
                        </button>
                    </h5>
                </div>

                <div id="doctor" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <form class="user" @submit.prevent="onSubmit">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="" class="font-weight-bold">Case Information: </label>
                                    <div class="form-check-inline mt-0">
                                        <div class="custom-control custom-radio">
                                            <input name="case" class="custom-control-input" id="customRadio6" type="radio" v-model="xcase" value="0">
                                            <label class="custom-control-label" for="customRadio6">Acute</label>
                                        </div>

                                    </div>
                                    <div class="form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input name="case" class="custom-control-input" id="customRadio7" type="radio" v-model="xcase" value="1">
                                            <label class="custom-control-label" for="customRadio7">Chronic</label>
                                        </div>
                                    </div>
                                    <div class="form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input name="case" class="custom-control-input" id="customRadio8" type="radio" v-model="xcase" value="2">
                                            <label class="custom-control-label" for="customRadio8">Pre-exiting</label>
                                        </div>
                                    </div>
                                    <div class="form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input name="case" class="custom-control-input" id="customRadio9" type="radio" v-model="xcase" value="3">
                                            <label class="custom-control-label" for="customRadio9">Injury</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Paient's Complain:</label>
                                    <textarea cols="30" rows="3" class="form-control" v-model="complain"></textarea>           
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Symptoms/Signs:</label>
                                    <textarea cols="30" rows="3" class="form-control" v-model="symptoms"></textarea>                 
                                </div>
                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Diagnosis:</label>
                                    <textarea cols="30" rows="3" class="form-control" v-model="diagnosis"></textarea>           
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Remarks:</label>
                                    <textarea cols="30" rows="3" class="form-control"v-model="remarks" ></textarea>                
                                </div>
                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-12">
         
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <table class="float-right">
                                        <tr>
                                            <td><button class="btn btn-primary  btn-sm" type="submit">Save & Continue</button></td>
                                        </tr>
                                    </table>
                                    
                                    
                                </div>
                                <span class="">
                                    

                                </span>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#laboratory" aria-expanded="false" aria-controls="collapseTwo">
                        Laboratory Test
                        </button>
                    </h5>
                </div>
                <div id="laboratory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <form class="user" @submit.prevent="onLab">
                            
                            <div class="form-group row"> 
                                
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Test Sample:</label> 
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-check-inline mt-0">
                                                    <div class="custom-control custom-radio">
                                                        <input name="test_sample" class="custom-control-input" id="urine" type="radio" v-model="test_sample" value="Urine">
                                                        <label class="custom-control-label" for="urine">Urine</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline mt-0">
                                                    <div class="custom-control custom-radio">
                                                        <input name="test_sample" class="custom-control-input" id="blood" type="radio" v-model="test_sample" value="Blood">
                                                        <label class="custom-control-label" for="blood">Blood</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline mt-0">
                                                    <div class="custom-control custom-radio">
                                                        <input name="test_sample" class="custom-control-input" id="stool" type="radio" v-model="test_sample" value="Stool">
                                                        <label class="custom-control-label" for="blood">Stool</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline mt-0">
                                                    <div class="custom-control custom-radio">
                                                        <input name="test_sample" class="custom-control-input" id="mri" type="radio" v-model="test_sample" value="MRI">
                                                        <label class="custom-control-label" for="mri">MRI</label>
                                                    </div>
                                                </div>
                                            </div>

                                         </div>

                                    </div>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-check-inline mt-0">
                                                    <div class="custom-control custom-radio">
                                                        <input name="test_sample" class="custom-control-input" id="ECG/ETG" type="radio" v-model="test_sample" value="ECG/ETG">
                                                        <label class="custom-control-label" for="ECG/ETG">ECG/ETG</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline mt-0">
                                                    <div class="custom-control custom-radio">
                                                        <input name="test_sample" class="custom-control-input" id="C-Scan" type="radio" v-model="test_sample" value="C-Scan">
                                                        <label class="custom-control-label" for="C-Scan">C-Scan</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline mt-0">
                                                    <div class="custom-control custom-radio">
                                                        <input name="test_sample" class="custom-control-input" id="White-Blood-Cell" type="radio" v-model="test_sample" value="White-Blood-Cell">
                                                        <label class="custom-control-label" for="White-Blood-Cell">White Blood Cell</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline mt-0">
                                                    <div class="custom-control custom-radio">
                                                        <input name="test_sample" class="custom-control-input" id="Red-Blood-Cell" type="radio" v-model="test_sample" value="Red-Blood-Cell">
                                                        <label class="custom-control-label" for="Red-Blood-Cell">Red Blood Cell</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Test Required:</label>
                                    <textarea id="" cols="30" rows="3" name="findings" v-model="test_required" class="form-control" ></textarea>                 
                                </div>
 
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <table class="float-right">
                                        <tr>
                                            <td><button class="btn btn-primary float-right btn-sm" type="submit">Send</button></td>
                                        </tr>
                                    </table>
                                    
                                    
                                </div>
                            </div>
                        </form>
                        
                        <table class="table table-striped">
                            <thead>
                                <th>Sample</th>
                                <th>Test Required</th>
                                <th>Result</th>
                                <th>Lab.Tech</th>
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
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#pharmacy" aria-expanded="false" aria-controls="collapseThree">
                        Pharmacy
                        </button>
                    </h5>
                </div>
                <div id="pharmacy" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <form class="user"  @submit.prevent="onPham">
                            <div class="form-group row">  
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Prescriptions:</label>
                                    <textarea id="" cols="30" rows="3" name="findings" v-model="prescription" class="form-control" ></textarea>                 
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Drugs:</label>
                                    <textarea id="" cols="30" rows="3" name="findings" v-model="drugs" class="form-control" disabled></textarea>                 
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <table class="float-right">
                                        <tr>
                                            <td><button class="btn btn-primary float-right btn-sm">Submit</button></td>
                                        </tr>
                                    </table>
                                    
                                    
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>

        </div>

                <!-- The Modal -->
        <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">@{{name}}'s Profile Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Date of birth:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="dob"  disabled>
                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Phone:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="phone" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Gender:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="gender" disabled>
                                    </div>
                                </div>
    

                            </div>
                            <div class="form-group row"> 
                                <div class="col-sm-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Blood group:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="blood_group"  disabled>
                                    </div>

                                </div> 
                                <div class="col-sm-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Marital Status </span>
                                        </div>
                                        <textarea id="" cols="30" rows="3" name="diagnosis" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="marital_status"></textarea>  
 
                                    </div>          
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Religion:</span>
                                        </div>
                                        <textarea id="" cols="30" rows="3" name="diagnosis" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="religion"></textarea>  
 
                                    </div>          
                                </div>
                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold">Food Allergies:</span>
                                        </div>
                                        <textarea id="" cols="30" rows="3" name="diagnosis" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="food_allergies" disabled ></textarea>  
 
                                    </div>
                                             
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold">Drug Allergies:</span>
                                        </div>
                                        <textarea id="" cols="30" rows="3" name="diagnosis" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="drug_allergies" disabled ></textarea>  
 
                                    </div>
                                             
                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold">Env. Allergies:</span>
                                        </div>
                                        <textarea id="" cols="30" rows="3" name="diagnosis" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="env_allergies" disabled ></textarea>  
 
                                    </div>
                                             
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Emg. Name:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="emg_name"  disabled>
                                    </div> 
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white font-weight-bold" id="inputGroup-sizing-sm">Emg. Phone:</span>
                                        </div>
                                        <input type="text" class="form-control bg-white text-primary font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" v-model="emg_phone"  disabled>
                                    </div>                                   
                                </div>
                            </div>

                        </form>
 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
     <a class="btn btn-primary btn-md mt-3" href="{{route('physician')}}">Back to List</a>
    </div>
    <script src="{{ asset('js/doctor.js')}}"></script>
@endsection