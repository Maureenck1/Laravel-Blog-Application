@extends('superClasses.mainPage')
@section('content')
<div style="background-color:#e6cccc;">
        <div class="container" style="background-color:#e6cccc;">
                <div class="card">
                    <div class="card-header" style="background-color:rgba(201,0,251,0.03);">
                        <h4 class="text-center mb-0">Posts By :&nbsp;<span>{{auth()->user()->name}}</span></h4>
                    </div>
                    <div class="card-body" style="background-color:#e6cccc;">
                        @if (count($posts)<1)
                        <h3> You Have No Posts Yet.</h3>
                            
                        @else
                        @foreach ($posts as $post)
                        <div class="card" style="margin-bottom:3%;">
                                <div class="card-body" style="background-color:rgb(225,175,234);">
                                    <h4>{{$post->title}}</h4>
                                    <h6 class="text-muted card-subtitle mb-2"><span id="Author">{{auth()->user()->name}}</span><span id="Date" style="padding-left:4%;">{{$post->created_at}}</span></h6>
                                    <p class="card-text">{!!$post->content!!}</p>
                                    <div style="text-align:center;">
                                        <div class="btn-group btn-group-lg" role="group"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#edit" data-title="{{$post->title}}" data-content="{{$post->content}}" data-id="{{$post->id}}"><i class="fa fa-edit"></i>Edit.</button>
                                                                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#delete" data-title="{{$post->title}}" data-id="{{$post->id}}"><i class="fa fa-trash"></i>Delete</button></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        @endif                
                    </div>
                </div>
            </div>
        </div>

        {{-- Modals to be throen when the buttons are clicked. --}}
        <div role="dialog" tabindex="-1" class="modal fade" id="edit">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit The Post.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <form method="POST" action= "{{action('Admin\UserController@update','id')}}">
                                    @method('PATCH')
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value = "" id="hidden">
                                <div class="form-group"><label><strong>Title</strong></label><input type="text" name="title" class="form-control" id="title" /></div>
                                <div class="form-group"><label><strong>Content:</strong></label><textarea name="content" class="form-control" id="content"></textarea></div>
                                <button class="btn btn-success btn-block btn-lg" type="submit">Update</button>
                            </form>
                        </div>
                        <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                    </div>
                </div>
            </div>

            {{-- Modal to be thrown when the delete button is clicked --}}

            <div role="dialog" tabindex="-1" class="modal fade" id="delete">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Confirmation.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <p><strong>Are You Sure You Want To Delete The Post With Title:</strong><span style="color:rgb(6,131,255);" id="title"><strong>Text</strong></span></p>
                                <div style="text-align:center;">
                                    <form method= "POST" action = "{{action('Admin\UserController@destroy','id')}}">
                                            @method("DELETE")
                                            {{ csrf_field() }}
                                        <input type="hidden" name="hidden" id="hidden">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-thumbs-up"></i><strong>Delete.</strong></button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                        </div>
                    </div>
                </div>

    @endsection