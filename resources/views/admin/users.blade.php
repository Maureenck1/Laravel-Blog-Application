@extends('superClasses.mainPage')
@section('content')
<div style="background-color:rgb(184,235,195);padding-top:5%;padding-bottom:5%">
        <div class="container">
            <h3 style = "text-align: center">All Users.</h3>
            <div class="table-responsive">
                
                        @if (count($users)<1)
                            <h3>There are No Users Registered.</h3>
                        @else
                        <table class="table table-striped table-bordered table-hover table-dark">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>UersName</th>
                                        <th>Email</th>
                                        <th>Date Created</th>
                                        <th>Edit User.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($users as $user)
                                     <tr>
                                            <td>{{$id++}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at->format('d M Y H:i:s')}}</td>
                                            <td><button class="btn btn-large btn-warning" data-toggle="modal" data-target="#editUser" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}"> <strong>Edit User.</strong></button></td>
                                            
                                        </tr>
                                     @endforeach                                             
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td><strong>id</strong><br></td>
                                                <td><strong>UersName</strong><br></td>
                                                <td><strong>Email</strong><br></td>
                                                <td><strong>Date Created</strong><br></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                        @endif
                      
            </div>
        </div>    
    </div>

    <div role="dialog" tabindex="-1" class="modal fade" id = "editUser">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form method = "post" action = "{{action('Admin\ViewPosts@updateUser')}}">
                        {{ csrf_field() }}
                        <input type = "hidden" name="id" value="" id="id"/>
                        <div class="form-group"><label><strong>UserName</strong>:</label><input type="text" name = "name" id="name"class="form-control" /></div>
                        <div class="form-group"><label><strong>Email:</strong></label><input type="email" name= "email" id = "email" class="form-control" /></div>
                        <div class="form-group"><label><strong>Roles:</strong></label><select class="form-control" id = "role" name = "role"><option value="1">Administrator</option>
                                                                                                                   <option value="2">User</option>
                        </select></div>
                        <div style="text-align:center"><button class="btn btn-success btn-lg" type="submit"><strong>Update.</strong></button></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
@endsection