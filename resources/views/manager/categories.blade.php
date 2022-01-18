@extends('superClasses.mainPage')
@section('content')
<div style="background-color:#d3e4f8; padding-top:3%; padding-bottom:3%">
    <div class="container">
            <button class="btn btn-primary" type="button" data-target ="#addCategory" data-toggle="modal"  style="font-size:22px;background-color:rgb(25,86,215);color:rgb(255,255,255); margin-bottom:1%"><i class="fa fa-plus" style="font-size:22px;"></i><strong>ADD CATEGORY.</strong></button>
    <div class="card-body" style="background-color:#b7e5eb;">
        <div class="card">
            <div class="card-header" style="background: linear-gradient(90deg,#b5186d, #b51860);">
                <h5 class="mb-0" style="color:rgb(247,251,255);"> Categories.</h5>
            </div>
            <div class="card-body" style="background-color:#b7e5eb;">
                @if (count($categories)<1)
                        <h3> There are No Categories Yet. Add Some By Clicking On The Button Above.<h3>                    
                @else

                @if (session('status'))
                    <div role="alert" class="alert alert-danger" style="background-color:rgb(213,127,135);">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>{{session('status')}}</strong></span></div>
                @endif
                <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-dark table-sm">
                            <caption>ALL Categories Table.</caption>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category name</th>
                                    <th>Description</th>                                                                     
                                    <th>Number Of Posts</th>
                                    <th>Date</th> 
                                    <th>Action.</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($categories as $categories)
                                    <tr>
                                    <td>{{$id}}</td>
                                    <td>{{ $categories->Name}}</td>
                                    <td>{!! $categories->Description!!}</td>
                                    <td>{{ $categories->id}}</td>
                                    <td>{{ $categories->created_at->format('d/M/Y')}}</td>
                                    <td>
                                    <button class="btn btn-success" style="background-color:#87cb16;color:#ffffff; border-radius:50%;" data-name="{{$categories->Name}}" data-description="{{ $categories->Description}}" data-date="{{ $categories->created_at->format('d/M/Y')}}" data-target="#viewCategory" data-toggle="modal"><i class="fa fa-eye" style="font-size:20px;color:rgb(0,0,0);"></i></button>
                                        <a class="btn btn-secondary" role="button" href="index,html" style="background-color:#34e8e8;color:#ffffff;border-radius:50%;margin-right:10px;margin-left:10px;" data-target="#deleteCategory" data-toggle="modal" data-name="{{$categories->Name}}" data-id="{{$categories->id}}" ><i class="fa fa-trash-o" style="font-size:20px;color:rgb(0,0,0);"></i></a>
                                        <a class="btn btn-success" role="button" href="index,html" style="background-color:#e8449d;color:#ffffff;border-radius:50%;" title="search ." data-toggle="modal" data-target="#editCategory"  data-name="{{$categories->Name}}" data-description="{{ $categories->Description}}" data-id="{{$categories->id}}"><i class="fa fa-edit" style="font-size:20px;color:rgb(0,0,0);"></i></a>
                                </td>
                                @php
                                    $id+1;
                                @endphp
                                </tr>
                                    @endforeach
                                
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>id</td>
                                    <td>Category name</td>
                                    <td>Date</td>
                                    <td>Description</td>
                                    <td>Number Of Posts</td>
                                    <td>Action.</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @endif
            </div>
        </div>
</div>
    </div>
</div>

{{-- The modal to be shown upon clicking the add category button. --}}
<div role="dialog" tabindex="-1" class="modal fade" id="addCategory">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#b7e5eb;">
                    <h4 class="text-center modal-title">Create New Category.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body" style="background-color:#b7e5eb;">
                    <form method="POST" action="{{action('Manager\Dashboard@addCategory')}}">
                        {{ csrf_field() }}
                        <div class="form-group"><label><strong>Name:</strong></label><input type="text" name = "name" class="form-control" /></div>
                        <div class="form-group"><label><strong>Description:</strong></label>
                            <textarea name = "description" class="form-control" id="article-ckeditor" placeholder="Description."></textarea>
                        </div>
                        <div class="form-group">
                            <div style="text-align:center;"><button class="btn btn-success btn-lg" type="submit" style="color:rgb(255,255,255);background-color:rgb(59,170,7);"><strong> Save</strong></button></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="background-color:#b7e5eb;"><button class="btn btn-danger" type="button" data-dismiss="modal" style="color:rgb(255,255,255);background-color:rgb(213,3,16);">Close</button></div>
            </div>
        </div>
    </div>

    {{-- Modal to be shown upn clicking the view Button Of The categories. --}}

    <div role="dialog" tabindex="-1" class="modal fade" id="viewCategory">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#b6f7f7;">
                        <h4 class="modal-title">Category Details.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body" style="background-color:#b6f7f7;">
                        <h4>Name Of Category:</h4>
                        <p id = "name">Paragraph</p>
                        <h4>Description Of Category:</h4>
                        <p id="description">Paragraph</p>
                        <h4>Creation Date:</h4>
                        <p id="date">Paragraph</p>
                    </div>
                    <div class="modal-footer" style="background-color:#b6f7f7;"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                </div>
            </div>
        </div>

        {{-- Modal to be throen upon clicking the delete button of the cateories in the table. --}}

        <div role="dialog" tabindex="-1" class="modal fade" id="deleteCategory">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#b3efef;">
                            <h4 class="modal-title">Confirmation.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <p><strong>Are You Sure You Want To Delete The Category With Title:</strong><span style="color:rgb(6,131,255);" id = "name"><strong >Text</strong></span></p>
                            <div style="text-align:center;">
                            <form method="POST" action= "{{action('Manager\Dashboard@deleteCategory')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-success" type="submit"><i class="fa fa-thumbs-up"></i><strong>Delete.</strong></button>
                                <input type="hidden" id = "id" name="id" value="">
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color:#b3efef;"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                    </div>
                </div>
            </div>

            {{-- The modal to be thrown when the edit button is clicked. --}}
            <div role="dialog" tabindex="-1" class="modal fade" id="editCategory">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#b7e5eb;">
                                <h4 class="text-center modal-title">Create New Category.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body" style="background-color:#b7e5eb;">
                                <form method="POST" action="{{action('Manager\Dashboard@editCategory')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id = "id">
                                    <div class="form-group"><label><strong>Name:</strong></label><input type="text" name = "name" id = "name"class="form-control" /></div>
                                    <div class="form-group"><label><strong>Description:</strong></label>
                                        <textarea name = "description" id = "description" class="form-control" placeholder="Description."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div style="text-align:center;"><button class="btn btn-success btn-lg" type="submit" style="color:rgb(255,255,255);background-color:rgb(59,170,7);"><strong> Save</strong></button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer" style="background-color:#b7e5eb;"><button class="btn btn-danger" type="button" data-dismiss="modal" style="color:rgb(255,255,255);background-color:rgb(213,3,16);">Close</button></div>
                        </div>
                    </div>
                </div>
            
@endsection