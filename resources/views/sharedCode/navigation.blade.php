<nav class="navbar navbar-light navbar-expand-lg navigation-clean-button" style="background-color:rgb(210,78,232);">
    <div class="container">
            <a class="navbar-brand" href="/"><img src="{{asset('assets/img/icon2.png')}}" style="max-height:30px;">TechBuzz Nation.</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav mr-auto">
                    <ul class="nav navbar-nav mr-auto">
                        @guest                        
                                                    <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(0,0,0);"><strong>GUEST.</strong></a></li>
                                                    <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(0,0,0);"><strong>Latest News</strong></a></li>
                                                    <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color:rgb(0,0,0);"><strong>Dropdown </strong></a>
                                                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                                                    </li>
                                                </ul>
                                    </ul>
                
                                    <!-- Right Side Of Navbar -->
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else                                
                                    @if (Auth::check())
                                        @if(Auth::user()->hasRole('Manager'))                                        
                                                                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{action('Manager\Dashboard@dashboard')}}" style="color:rgb(0,0,0);"><strong>Manager Dashboard.</strong></a></li>
                                                                    {{-- <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(0,0,0);"><strong>Latest News</strong></a></li> --}}
                                                                    <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color:rgb(0,0,0);"><strong>Dropdown </strong></a>
                                                                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                                                                    </li>
                                                                </ul>
                                                    </ul>
                                
                                                    <!-- Right Side Of Navbar -->
                                                    <ul class="navbar-nav ml-auto">
                                                        <!-- Authentication Links -->
                                        {{-- <li class="nav-item" role="presentation"><a class="nav-link" href="{{action('Admin\UserController@create')}}" style="color:rgb(0,0,0);"><strong>Add Post.</strong></a></li>    --}}
                                        {{-- <li class="nav-item" role="presentation"><a class="nav-link" href="{{action('Admin\ViewPosts@individualPosts')}}" style="color:rgb(0,0,0);"><strong>My Posts.</strong></a></li>--}}
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{action('Manager\Dashboard@viewAllUsers')}}"> <strong style="color:black">View All Users.</strong></a></li>
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    <img src="{{asset('assets/img/icon2.png')}}" style="max-height:30px;" class="rounded-circle img-fluid" > {{ Auth::user()->name }} <span class="caret"></span>
                                                    {{-- <img class="rounded-circle img-fluid" src="icon2.png" style="max-height:100px;" /> --}}
                                                </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a href="#" class = "dropdown-item"> Manager.</a>
                                        @endif 
                                        
                                        @if(Auth::user()->hasRole('Member'))
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(0,0,0);"><strong>MEMBER.</strong></a></li>
                                                                    {{-- <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(0,0,0);"><strong>Latest News</strong></a></li> --}}
                                                                    <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color:rgb(0,0,0);"><strong>Dropdown </strong></a>
                                                                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                                                                    </li>
                                                                </ul>
                                                    </ul>
                                
                                                    <!-- Right Side Of Navbar -->
                                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{action('Admin\UserController@create')}}" style="color:rgb(0,0,0);"><strong>Add Post.</strong></a></li>   
                                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{action('Admin\ViewPosts@individualPosts')}}" style="color:rgb(0,0,0);"><strong>My Posts.</strong></a></li>                                   
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    <img src="{{asset('assets/img/icon2.png')}}" style="max-height:30px;" class="rounded-circle img-fluid" > {{ Auth::user()->name }} <span class="caret"></span>
                                                    {{-- <img class="rounded-circle img-fluid" src="icon2.png" style="max-height:100px;" /> --}}
                                                </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="#" class = "dropdown-item"> Member.</a>
                                    @endif 
                                        
                                    @endif
                                    <a href="{{action('Admin\ViewPosts@personalDetails')}}" class="dropdown-item">Personal Details.</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
