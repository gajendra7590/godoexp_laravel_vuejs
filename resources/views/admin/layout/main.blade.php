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

  <!-- <link href="{{ URL::asset('adminjscss/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> 
  <link rel="stylesheet" href="{{ URL::asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}"> 
  <link rel="stylesheet" href="{{ URL::asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}"> 
  <link rel="stylesheet" href="{{ URL::asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}"> 
  <link rel="stylesheet" href="{{ URL::asset('backend/dist/css/AdminLTE.min.css') }}"> 
  <link rel="stylesheet" href="{{ URL::asset('backend/dist/css/skins/_all-skins.min.css') }}"> 
  <link rel="stylesheet" href="{{ URL::asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}"> 
  <link rel="stylesheet" href="{{ URL::asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"> 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="{{ URL::asset('backend/custom.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper" id="app">
      @yield('content')
  <div class="control-sidebar-bg"></div>
</div> 
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/custom.js') }}"></script> 
<script src="{{ URL::asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script> 
<script src="{{ URL::asset('backend/bower_components/jquery-ui/jquery-ui.min.js') }}"></script> 
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script> 
<script src="{{ URL::asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script> 
<script src="{{ URL::asset('backend/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ URL::asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script> 
<script src="{{ URL::asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script> 
<script src="{{ URL::asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script> 
<script src="{{ URL::asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script> 
<script src="{{ URL::asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script> 
<script src="{{ URL::asset('backend/dist/js/adminlte.min.js') }}"></script> 
<script src="{{ URL::asset('backend/dist/js/demo.js') }}"></script>
</body>
</html>
