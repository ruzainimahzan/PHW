@extends('layouts.app')
@section('content')
<body class="hold-transition login-page background-pws">
<div class="login-box">
 

  <!-- /.login-logo -->
  <div class="login-box-body">
  <div class="login-logo">
    <img src="{{asset('images/passionate.jpg')}}" width="90%" height="100%">
  </div>
    <p class="login-box-msg">Sign in to start your session</p>
    <form action="{{ route('login') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group has-feedback">
           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>        
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
      </div>
      <div class="form-group has-feedback">
         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
               <div class="col-xs-12">
                  <a href="{{ route('forgot_password') }}">Forgot Password?</a>
               </div>
            </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
              </label>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
           <button type="submit" class="btn btn-warning pull-right" style="color:white;">
              {{ __('Login') }}
            </button>
        </div>
      </div>
    </form>
@stop