@extends('layouts.app')
@section('content')
    

        <!-- Page Heading -->
    <div id="dependent" class="container-fluid">
        <!-- Page Heading -->
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-primary float-right" data-toggle="modal" @click="newDep"> New </button>
                   
                </h5>
                
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Relationship</th>
                        <th colspan="2"> Action</th>

                    </thead>
                    <tbody>
                        <tr v-for="dependent in dependents" :key ="dependent.id">
                            <td v-text="dependent.name"></td>
                            <td v-text="dependent.dob"></td>
                            <td v-text="relationships[dependent.relationship]"></td>
                            <td><a @click="edit(dependent)"><i class="fas fa-edit" style="font-size:24px; color:dodgerblue"></i></a></td>
                           
                            <td>
                                <a @click="confirm(dependent.id)">
                                    <i class="fas fa-trash" style="font-size:24px; color:red"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>

        <!-- modal large new dependents form-->
        <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">New Dependents Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="user">
                        <div class="modal-body">
                            
                                <div class="form-group row"> 
                                    <div class="col-sm-12">
                                        <label for="" class="small font-weight-bold">Full Name:</label>
                                        <input type="text" class="form-control form-control-user" v-model="name">
                                          
                                    </div> 

                                </div>
                                <div class="form-group row">  
                                    <div class="col-sm-12">
                                        <label for="" class="small font-weight-bold">Date of Birth</label>
                                        <input type="date" class="form-control form-control-user"  v-model="dob">
                                                
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="" class="small font-weight-bold">Relationship:</label>
                                        <select class="form-control" v-model="relationship" >
                                            <option>Select...</option>
                                            <option v-for="(name, value) in relationships" :value="value">
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

        <!-- modal large new dependents form-->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Edit Dependents Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="user">
                        <div class="modal-body">
                            
                                <div class="form-group row"> 
                                    <div class="col-sm-12">
                                        <label for="" class="small font-weight-bold">Full Name:</label>
                                        <input type="text" class="form-control form-control-user" v-model="name">
                                          
                                    </div> 

                                </div>
                                <div class="form-group row">  
                                    <div class="col-sm-12">
                                        <label for="" class="small font-weight-bold">Date of Birth</label>
                                        <input type="date" class="form-control form-control-user"  v-model="dob">
                                                
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="" class="small font-weight-bold">Relationship:</label>
                                        <select class="form-control" v-model="relationship" >
                                            <option>Select...</option>
                                            <option v-for="(name, value) in relationships" :value="value">
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
                            <p>Do you want to delete this Dependent? </p>
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
        
        
     
    
    <script src="{{ asset('js/dependent.js')}}"></script>
@endsection  