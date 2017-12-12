<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Private Security System - OneBiz</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>
<body class="hold-transition login-page"  style="background: #FFF;">
  <div class="login-box" style="width: 450px">
    <div class="login-logo">
      <img src="{{asset('img/logo.jpg')}}" alt="Logo" width="200">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <form action="{{ url('/login') }}" method="post">
        {{ csrf_field() }}
          <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
            <input type="text" class="form-control" name="username" placeholder="ឈ្មេាះចូលប្រព័ន្ធ" value="{{ old('username') }}">
            <span class="fa fa-user form-control-feedback"></span>
            @if ($errors->has('username'))
            <span class="help-block">
              <strong>{{ $errors->first('username') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group has-feedback { $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="លេខសម្ងាត់">
            <span class="fa  fa-key form-control-feedback"></span>
             @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">ចូលប្រព័ន្ធ</button>
            </div>

          </div>
        </form>

      </div>

    </div>


    <!-- jQuery 2.2.3 -->
    <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
