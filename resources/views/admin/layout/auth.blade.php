<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="">
  <link rel="icon" href="{{ URL::asset('images/fav_icn.png') }}" type="image/x-icon">
  <title>GoDo Experiences</title>

  <!--   <link href="{{ URL::asset('adminjscss/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
 -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('admin/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('admin/plugins/iCheck/square/blue.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="{{ URL::asset('admin/custom.css') }}">
</head>
<body class="hold-transition login-page" style="background: #9faab5 url(/images/auth_backd.jpg);">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>GoDo</b>Experience</a>
        </div>
        <div id="app_auth">
           @yield('content')
        </div>
    </div>
<script type="text/javascript" src="{{ URL::asset('js/app_auth.js') }}"></script>
<!-- jQuery 3 -->
<script src="{{ URL::asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ URL::asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/iCheck/icheck.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script type="text/javascript" src="{{ URL::asset('admin/custom.js') }}"></script>
</body>
</html>
