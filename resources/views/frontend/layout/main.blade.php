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
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('frontend/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('frontend/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('frontend/css/lightbox.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('frontend/css/sweetalert.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('frontend/css/custom.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('frontend/css/responsive-custom.css') }}"> 
 
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper" id="app">
      @yield('content')
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper --> 
<script type="text/javascript" src="{{ URL::asset('js/front_app.js') }}"></script>  
<script type="text/javascript" src="{{ URL::asset('frontend/js/jquery.min.js') }}"></script>  
<script type="text/javascript" src="{{ URL::asset('frontend/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/lightbox.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/jquery.validate.min.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('frontend/js/custom.js') }}"></script>
</body>
</html>
