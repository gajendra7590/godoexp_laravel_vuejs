<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Experiences;
use App\models\Categories;

class ExperienceDetailController extends Controller
{
    public function getDetail(Request $request,$slug){
        return Experiences::with([
            'category'=> function($model){
                $model->select(['id','name','slug']);
            }
        ])
        ->where(['slug'=>$slug])
        ->select(['*'])
        ->get()
        ->first();
    }
}
