<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\models\Experiences;
use App\models\Categories;
use App\models\ExperienceAvailability;

class ExperienceDetailController extends Controller
{
    public function getDetail(Request $request,$slug){
        return Experiences::with([
            'category'=> function($model){
                $model->select(['id','name','slug']);
            },
            'adons'=> function($model){
            },
            'media'=> function($model){
            }
        ])
        ->where(['slug'=>$slug])
        ->select(['*'])
        ->get()
        ->first();
    }

    public function getSavedDate(Request $request,$id){
        $model = Experiences::find($id);
        if(!$model){
            return false;
        }

        $data = $request->all();
        $y = ( isset($data['y']) && ($data['y']!='undefined')) ? $data['y'] : date('Y');
        $m = ( isset($data['m']) && ($data['m']!='undefined')) ? $data['m'] : date('m');
        $data = DB::table('experience_availability')
        ->select(DB::raw("group_concat(date) as dates"))
        ->groupBy('month')->where(['experiences_id' => $id,'year'=>$y,'month' => $m])
        ->get()->first();
        $dates = [];
        if($data){
            $dates = explode(',',$data->dates);
        }
        return [
            'dates' => $dates,
            'events' => $this->getAllEventsWithAdons($id,$y,$m)
        ];
    }

    private function getAllEventsWithAdons($id,$Y,$M){
        $model = ExperienceAvailability::
        where([
            'experiences_id' => $id,
            'year' => $Y,
            'month' => $M
        ])
        ->select('id','experiences_id','month','year','date')
        ->get()
        ->toArray();
        $newArray = [];
        if( !empty($model) ){
            foreach($model as $k => $m){
                $d = date('Y-m-d',strtotime($m['year'].'-'.$m['month'].'-'.$m['date']));
                if( $d >= date('Y-m-d') ){
                    $m['show'] = true; 
                    $newArray[ $m['date'] ] = $m;
                }
            }
        }
        return $newArray;
    }
}
