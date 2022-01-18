@extends('superClasses.mainPage')
@section('content')
<div class="login-clean" style="background-color:rgb(235,233,233);margin-top:-2%;margin-bottom:-2%;">
        <form method="POST" action="{{ route('login') }}">
                <input type = "hidden" name = "_token" value = "{!! csrf_token() !!}">
            <h2 class="text-center">TechBuzz&nbsp;</h2>
            <div class="illustration"><img class="rounded-circle img-fluid" src="assets/img/icon2.png" style="max-height:100px;"></div>
            <div class="form-group">                                                       
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder = "Email "value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                
            </div>

            <div class="form-group">                                                       
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder = "Password " name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                            
            </div>
            <div class="form-group">
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
            <div class="form-group">
                            
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                
            </div>
        </form>
    </div>
@endsection
