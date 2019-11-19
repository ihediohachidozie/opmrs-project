@extends('layouts.app')
@section('content')
    
        <!-- Page Heading -->
    <div id="practitioner" class="container-fluid">
        <!-- Page Heading -->
        <div class="card">
            <div class="card-header" id="headingOne">
                <table class="table-borderless">
                    <tr>
                        <td><input class="form-control mr-sm-2" type="text" placeholder="Enter the National Id" v-model="nin"></td>
                        <td><button class="btn btn-success" @click="getInfo()">Search</button></td>
                        <td><button class="btn btn-warning" @click="onLoad()">Refresh</button></td>
                        <td><button class="btn btn-primary btn-block" data-toggle="modal" @click="newPrat()"> New </button></td>
                    </tr>

                </table>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>National ID</th>
                        <th>Name</th>
                        <th>License No</th>
                        <th>Profession</th>
                        <th>Valid Till</th>
                        <th colspan="2" class="text-center"> Action</th>

                    </thead>
                    <tbody>
                        <tr v-for="practitional in practitionals" >
                            <td v-text="practitional.user.national_id"></td>
                            <td v-text="practitional.user.firstname +' '+ practitional.user.lastname" ></td>
                            <td v-text="practitional.license"></td>
                            
                            <td v-text="professions[practitional.profession]"></td>
                            <td v-text="practitional.valid"></td>
                            <td><a @click="edit(practitional)"><i class="fas fa-edit" style="font-size:24px; color:dodgerblue"></i></a></td>
                           
                            <td>
                                <a @click="confirm(practitional.id)">
                                    <i class="fas fa-trash" style="font-size:24px; color:red"></i>
                                </a>
                            </td>
                        </tr> 
                    </tbody>
                </table>

            </div>

        </div>

        <!-- modal large new practitioner form-->
        <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">New Practitioner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="user">
                        <div class="modal-body">
                            
                            <div class="form-group row"> 
                                <div class="col-sm-4">
                                    <label for="" class="small font-weight-bold">National ID:</label>
                                    <input type="text" class="form-control form-control-user" v-model="nin" @blur="getInfo1()">
                                        
                                </div>
                                <div class="col-sm-8">
                                    <label for="" class="small font-weight-bold">Full Name:</label>
                                    <input type="text" class="form-control form-control-user" v-model="name" disabled>
                                        
                                </div> 
                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">License No.</label>
                                    <input type="text" class="form-control form-control-user"  v-model="license">
                                            
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Valid Till</label>
                                    <input type="date" class="form-control form-control-user"  v-model="valid">
                                            
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="" class="small font-weight-bold">Profession:</label>
                                    <select class="form-control" v-model="profession" >
                                        <option>Select...</option>
                                        <option v-for="(name, value) in professions" :value="value">
                                            @{{name}}
                                        </option>
                                    
                                    </select>            
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="clear()">Cancel</button>
                            <button type="button" class="btn btn-primary" @click="onSubmit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal large new practitioner form-->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Edit Practitioner</h5>
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
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">License No.</label>
                                    <input type="text" class="form-control form-control-user"  v-model="license">
                                            
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="small font-weight-bold">Valid Till</label>
                                    <input type="date" class="form-control form-control-user"  v-model="valid">
                                            
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="" class="small font-weight-bold">Profession:</label>
                                    <select class="form-control" v-model="profession" >
                                        <option>Select...</option>
                                        <option v-for="(name, value) in professions" :value="value">
                                            @{{name}}
                                        </option>
                                    
                                    </select>            
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="onUpdate()">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

                    <!-- The delete post Modal  -->
        <div class="modal" id="delete">
            <div class="modal-dialog">
                <div class="modal-content">
        
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Attention User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
        
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Do you want to delete this Practitioner? </p>
                    </div>
        
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" @click="onDelete()" class="btn btn-success" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                    </div>
        
                </div>
            </div>
        </div>
    </div>
        
<script src="{{ asset('js/practition.js')}}"></script> 
@endsection