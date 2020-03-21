<?php
   use Illuminate\Http\Request;
   $page = last(request()->segments());
?>

@extends('admin.layout.main')

@section('title', $page)

@section('content')
 <App />
@endsection
