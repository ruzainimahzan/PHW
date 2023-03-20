@extends('layouts.app')
@section('content')
<body class="hold-transition login-page background-pws">
   <div class="login-box">
      <!-- /.login-logo -->
      <div class="login-box-body">
         <div class="login-logo">
            <img src="{{asset('images/passionate.jpg')}}" width="90%" height="100%">
         </div>
         <p class="login-box-msg">Forgot Password</p>
         <form action="{{ route('forgot_password_process') }}" method="post">
         {{ csrf_field() }}
            <div class="form-group has-feedback">
               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>        
               <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
               <input name="password" id="password" type="password" class="form-control" placeholder="Password" required>
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
               <input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirm Password" required>
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row" align="right">
               <div class="col-xs-12" >
                  <button type="submit" class="btn btn-primary btn-block">Change password</button>
               </div>
               <!-- /.col -->
            </div>
         </form>
         <br>
         <p class="mt-3 mb-1">
            <a href="{{ route('login') }}">Login</a>
         </p>
      </div>
      <!-- /.login-card-body -->
   </div>
</body>
@endsection