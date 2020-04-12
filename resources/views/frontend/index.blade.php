<?php
   use Illuminate\Http\Request;
   $page = last(request()->segments());
?>

@extends('frontend.layout.main')

@section('content')
 <App />
@endsection
