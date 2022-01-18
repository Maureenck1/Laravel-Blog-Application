@extends('superClasses.mainPage')
@section('content')
<div style="background-color:#d3e4f8;">
 <div class="container">
        <div class="row">
            <div class="col">
                <h2 style="margin-top:0px;font-family:'Gentium Book Basic', serif;">Manager Dashboard.</h2>
            </div>
        </div>
        <ol class="breadcrumb" style="background-color:#f1655c;margin-top:10px;">
            <li class="breadcrumb-item"><a href="index.html"><span>Home</span></a></li>
            <li class="breadcrumb-item"><a href="login.html"><span>LogIn&nbsp;</span></a></li>
            <li class="breadcrumb-item"><a href="nivice.html"><span>CEO Panel.</span></a></li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card" style="background-color:#b7e5eb;">
                    <div class="card-header" style="background-color:rgba(181,24,109,0.59);">
                        <h5 class="mb-0">Navigation&nbsp;</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group"><a class="list-group-item list-group-item-action list-group-item-info active"><span><strong>Home</strong></span></a><a class="list-group-item list-group-item-action"><span data-toggle="modal" data-target="#ceomodal"><strong>Message User.</strong></span></a>
                            <a
                                class="list-group-item list-group-item-action" href="login.html"><span><strong>Edit Details.</strong></span></a><a class="list-group-item list-group-item-action" href="login.html"><span><strong>Manage Posts and Comments.</strong></span></a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div>
                    <div class="card">
                        <div class="card-header" style="background-color:#b5186d;">
                            <h5 class="mb-0">Major Operations ....</h5>
                        </div>
                        <div class="card-body" style="background-color:#b7e5eb;">
                            <div class="row">
                                <div class="col">
                                    <div class="card" data-bs-hover-animate="jello" style="background:linear-gradient(90deg, #11998e 0%, #38ef7d 100%);cursor:pointer;" data-toggle="modal" data-target="#search">
                                        <div class="card-body" style="color:rgb(254,255,255);">
                                            <p style="color:rgb(249,249,249);"><i class="fa fa-search" style="font-size:50px;"></i>&nbsp; &nbsp; &nbsp; &nbsp;search for&nbsp;</p>
                                            <p style="color:rgb(255,252,252);"><strong>User.</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="background:linear-gradient(90deg , #45b649 0%, #dce35b 100%);color:rgb(255,255,255);">
                                        <div class="card-body" style="color:rgb(255,255,255);">
                                            <p style="color:rgb(255,255,255);"><i class="fa fa-book" style="font-size:50px;"></i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add&nbsp;</p>
                                            <p style="color:rgb(255,255,255);"><strong>Role.</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col"><a href = "{{action('Manager\Dashboard@ManageCateories')}}">
                                    <div class="card" style="background:linear-gradient(90deg,#3f5efb 0%, #fc466b 100%);">
                                        <div class="card-body">
                                            <p style="color:rgb(255,255,255);"><i class="fa fa-comments" style="font-size:50px;"></i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Manage</p>
                                            <p style="color:rgb(255,255,255);"><strong>Categories.</strong></p>
                                        </div>
                                    </div></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color:rgba(181,24,109,0.59);">
                <h5 class="mb-0"> Posts Table&nbsp;</h5>
            </div>
            <div class="card-body" style="background-color:#b7e5eb;">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-dark table-sm">
                        <caption>This table is all &nbsp;about the doctors appointments.</caption>
                        <thead>
                            <tr>
                                <th class="th" style="color:rgb(255,255,255);">Doctor Name</th>
                                <th style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;color:rgb(255,255,255);">Patient Name</th>
                                <th class="th" style="color:rgb(255,253,253);">Time&nbsp;</th>
                                <th class="th" style="color:rgb(254,254,254);">Patient Id&nbsp;</th>
                                <th style="color:rgb(255,246,246);">Appointmant Date</th>
                                <th style="color:rgb(255,246,246);">Appointmant Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- The body of The Posts. --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><em>FIRST NAME .</em><br></td>
                                <td><em>SECOND NAME.</em><br></td>
                                <td><em>TIME</em>&nbsp;<br></td>
                                <td><em>PATIENT ID&nbsp;</em><br></td>
                                <td>Appoinment date</td>
                                <td><em>ACTIONS .</em><br></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Search Modal. --}}
<div role="dialog" tabindex="-1" class="modal fade" id = "search">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#beebeb;">
                    <h4 class="modal-title">Enter Name To Search For User.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form method="POST" action="{{action('Manager\Dashboard@searchUser')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div><input type="text" name="username" placeholder="Username" class="form-control" />
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div style="text-align:center;">
                            <div class="form-group"><button class="btn btn-success btn-lg" type="submit"><strong>Search.</strong></button></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="background-color:#beebeb;"><button class="btn btn-danger" type="button" data-dismiss="modal"><strong>Close</strong></button></div>
            </div>
        </div>
    </div>
@endsection