<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
//All Models
use App\User;
use App\models\Categories;
use App\models\Experiences;

class DashboardController extends Controller
{
   public function getWidgets(Request $request){
      return [
          'experiences_count' => $this->experiences_count(),
          'clients_count' => $this->clients_count(),
          'vendors_count' => $this->vendors_count(),
          'categories_count' => $this->categories_count(),
      ];
   }

   protected function experiences_count(){
     return Experiences::where('status','!=',2)->count();
   }

   protected function clients_count(){
     return User::where('status','!=',2)->where(['role_id' => '3'])->count();
   }

  protected function vendors_count(){
    return User::where('status','!=',2)->where(['role_id' => '2'])->count();
  }

  protected function categories_count(){
    return Categories::where('status','!=',2)->count();
  }




}
