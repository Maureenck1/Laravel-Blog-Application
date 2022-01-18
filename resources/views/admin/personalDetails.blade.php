@extends('superClasses.mainPage')
@section('content')
<div style="background-image:url(&quot;{{asset('assets/img/desk.jpg')}}&quot;);background-repeat:no-repeat;background-size:cover;">
    {{-- <div style="background-image:url(&quot;desk.jpg&quot;);background-repeat:no-repeat;background-size:cover;"> --}}
        <div class="row register-form" style="background-color:rgba(252,251,251,0);background-repeat:no-repeat;background-size:cover;">
            <div class="col-sm-12 col-md-8 offset-sm-0 offset-md-2">
                <form class="custom-form" style="background-color:rgba(255,255,255,0.67);">
                    <h1>Personal Details Form.</h1>
                    <div class="form-row form-group">
                        <div class="col-sm-4 label-column"><label for="name-input-field" class="col-form-label">First Name:</label></div>
                        <div class="col-sm-6 input-column"><input type="text" required name="firstName" class="form-control" /></div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-sm-4 label-column"><label for="name-input-field" class="col-form-label">Second Name:</label></div>
                        <div class="col-sm-6 input-column"><input type="text" required name="secondName" class="form-control" /></div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-sm-4 label-column"><label for="email-input-field" class="col-form-label">Email:</label></div>
                        <div class="col-sm-6 input-column"><input type="email" required name="email" class="form-control" /></div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-sm-4 label-column"><label for="pawssword-input-field" class="col-form-label">Phone Number:</label></div>
                        <div class="col-sm-6 input-column"><input type="text" name="phone" class="form-control" /></div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-sm-4 label-column"><label for="pawssword-input-field" class="col-form-label">Gender:</label></div>
                        <div class="col-sm-6 input-column"><select name="gender" class="form-control"><option value="male">Male</option><option value="female">Female</option></select></div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-sm-4 label-column"><label for="pawssword-input-field" class="col-form-label">Date Of Birth:</label></div>
                        <div class="col-sm-6 input-column"><input type="date" name="date" class="form-control" /></div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-sm-4 label-column"><label for="pawssword-input-field" class="col-form-label">Favorite Color:</label></div>
                        <div class="col-sm-6 input-column"><input type="color" name="color" /></div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-sm-12 label-column">
                            <div class="dashed_upload">
                                <div class="wrapper">
                                    <div class="drop">
                                        <div class="cont"><i class="fa fa-cloud-upload"></i>
                                            <div class="tit">Drag &amp; Drop</div>
                                            <div class="desc">or</div>
                                            <div class="browse">click here to browse</div>
                                        </div><output id="list"></output><input id="files" multiple name="files[]" type="file" /></div>
                                </div>
                            </div>
                        </div>
                    </div><button class="btn btn-success submit-button" type="submit" style="background-color:rgb(2,181,52);">Submit</button></form>
            </div>
        </div>
    </div>
@endsection