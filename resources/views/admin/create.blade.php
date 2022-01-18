@extends('superClasses.mainPage')
@section('content')
<div class="contact-clean" style="background-image:url(&quot;{{asset('assets/img/beach.jpg')}}&quot;);background-size:cover;background-repeat:no-repeat;">
<form method="post" action="{{action('Admin\UserController@store')}}">
        <input type = "hidden" name = "_token" value = "{!! csrf_token() !!}">
        <div style="text-align:center;"><img class="rounded-circle img-fluid" src="{{asset('assets/img/icon2.png')}}" style="max-width:100px;"></div>
        <h2 class="text-center">Add Post.</h2>
        {{-- <a href="{{asset('assets\img\beach.jpg')}}">Image....</a> --}}
        <div class="form-group"><label><strong>Post Title:</strong></label><input class="form-control" type="text" name="name" placeholder="Title"></div>
        <div class="form-group"><label><strong>Post Content:</strong></label><textarea class="form-control" id = "article-ckeditor" rows="14" name="message" placeholder="Content"></textarea></div>
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color:rgb(39,180,78);">send </button></div>
    </form>
</div>
@endsection