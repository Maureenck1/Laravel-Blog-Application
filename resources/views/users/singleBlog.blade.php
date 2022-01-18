@extends('superClasses.mainPage')
@section('content')
<div class="article-clean">
        <div class="container" style = "font-family:'Times New Roman', Times, serif ">
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="intro">
                        <h1 class="text-center">{{$blogItem->title}}</h1>
                        <p class="text-center"><span class="by">by</span> <a href="#">{{$user->name}}</a><span class="date" style="padding-left:2%">{{$blogItem->created_at->format('d M Y')}}</span></p><img class="img-fluid" src="{{asset('assets/img/desk.jpg')}}"></div>
                    <div class="text">
                       <p>{!!$blogItem->content!!}</p>                        
                            <figcaption>Caption</figcaption>
                        </figure>
                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae. Suspendisse vel placerat ligula. Vivamus ac sem lac. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit
                            pulvinar dictum vel in justo.</p>
                    </div>
                    <form action = "{{action('LoadController@handleBlogComment')}}" method="POST">

                        {{ csrf_field() }}
                        <input type="hidden" name="blogItemId" value="{{$blogItem->id}}" id="blogItemId">
                        <h3 class="text-center">Leave Your Comments On The Post.</h3>
                        <div class="form-row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group"><label><strong>Name:</strong></label><input type="text" name ="name" class="form-control" /></div>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group"><label><strong>Email:</strong></label><input type="email" name ="email" class="form-control" /></div>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group"><label><strong>Comment:</strong></label><textarea rows="5" name ="comment" class="form-control"></textarea>                                    
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-3">
                            <div style="text-align:center;"><button class="btn btn-success btn-lg" type="submit">Submit.</button></div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0"><b>Comments.</b></h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @if (count($comments)<1)
                                    <h4> There are no comments Aaiable Yet. Be The First To Post.</h4>
                                @else
                                    @foreach ($comments as $comment)
                                    <li class="list-group-item" style="margin-bottom:6px;">
                                            <div class="media">
                                                <div></div>
                                                <div class="media-body">
                                                    <div class="media" style="overflow:visible;">
                                                        <div><img src="{{asset('assets\img\avatar-1606916__480.png')}}" class="mr-3" style="width: 25px; height:25px;" /></div>
                                                        <div class="media-body" style="overflow:visible;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><a href="#">{{ $comment->name. "  "}}</a>{{ $comment->comment }}<br /><small class="text-muted">{{$comment->created_at}}</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection