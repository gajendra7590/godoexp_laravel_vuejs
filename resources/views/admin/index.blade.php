<?php
   use Illuminate\Http\Request;
   $page = last(request()->segments());
?>

@extends('admin.layout.main')

@section('content')
 <App />
@endsection
