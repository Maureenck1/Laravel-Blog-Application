@extends('superClasses.mainPage')
@section('content')
<div class="article-list" style="background-color:rgb(235,233,233);">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Latest Tech News.</h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
            </div>
            <div class="row articles">                
                @if (count($posts)<1)
                <p>There are no posts here.</p>
                    
                @else
                @foreach ($posts as $post)
                @php
                    $stringValue = str_limit($post->content, 150, "<a href=\"/singleBlog/$post->user_id/$post->id\">  more...</a>");
                @endphp                
            <div class="col-sm-6 col-md-4 item"><a href="/singleBlog/{{$post->user_id}}/{{$post->id}}"><img class="img-fluid" src="assets/img/code3.png"></a>
                <h3 class="name">{{$post->title}}</h3>
                <p class="description">{!!$stringValue!!}</p>
                <a href="/singleBlog/{{$post->user_id}}/{{$post->id}}" class="action"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
                @endforeach                
                @endif
    </div>
    </div>
    </div>
@endsection