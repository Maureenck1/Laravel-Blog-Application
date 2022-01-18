@extends('superClasses.mainPage')
@section('content')
<img src="{{asset('storage/images/android.jpeg')}}" alt="No Image">
<div class="container">
        <h3 class="text-center">Submit An Image.</h3>
        <div style="text-align:center;">
            <form enctype="multipart/form-data" method="POST" action= "{{action('Manager\Dashboard@upload')}}">
                {{ csrf_field() }}
                <div class="form-group"><input type="file" accept="image/*" name="image" required=""></div>
                <div class="form-group"><button class="btn btn-success btn-lg" type="submit"><strong>Button</strong></button></div>
            </form>
        </div>
</div>
@endsection