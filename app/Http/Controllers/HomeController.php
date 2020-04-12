<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

     public function adminHome(){
        return view('admin.index');
     }

     public function auth(){
        return view('admin.auth_main');
     }

     public function frontHome(){
         return view('frontend.index'); 
     }
}
