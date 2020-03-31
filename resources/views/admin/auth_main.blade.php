<?php
   use Illuminate\Http\Request;
   $page = last(request()->segments());
?>

@extends('admin.layout.auth')

@section('title', $page)

@section('content')
 <App2 />
@endsection
