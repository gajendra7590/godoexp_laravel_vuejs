<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Experiences;
use App\models\Categories;

class ExperiencesController extends Controller
{
    /**
     * Home Page Get All Data
     * @param Request $request
     * @return array
     */
    public function index_home(Request $request){
        return [
            'top_categories' => $this->topCategories(),
            'top_world_around_experiences' => $this->topWorldAroundExperiences(),
            'top_featured_experiences' => $this->topFeaturedExperiences(),
            'top_rated_experiences' => $this->topRatedExperiences()
        ];
    }
 

    //Function for get categories( callback for home page )
    private function topCategories(){
        return Categories::selectRaw('EC.id,EC.name,EC.title,EC.slug,EC.category_image_url,EC.featured,
                   (SELECT count(E.id) FROM experiences E WHERE E.category_id = EC.id) as total_exp'
               )->from('experience_categories as EC')->orderBy('total_exp','DESC')->limit(3)->get();
    }

    //Function for get topWorldAroundExperiences( callback for home page )
    private function topWorldAroundExperiences(){
        return Experiences::with([
                   'category'=> function($model){
                       $model->select(['id','name']);
                   }
               ])
        ->where(['status'=>'1'])
        ->select([
            'id','category_id','user_id','title','sub_title','slug','experiences_image_url',
            'price','duration','duration_type','group_size','activity_level','featured'
        ])
        ->orderBy('id','DESC')->limit(5)->get()->all();
    }

    //Function for get topFeaturedExperiences( callback for home page )
    private function topFeaturedExperiences(){
        return Experiences::with([
            'category'=> function($model){
                $model->select(['id','name']);
            }
        ])
        ->where(['status'=>'1'])
        ->select([
            'id','category_id','user_id','title','sub_title','slug','experiences_image_url',
            'price','duration','duration_type','group_size','activity_level','featured'
        ])
        ->orderBy('id','DESC')->limit(4)->get()->all();
    }

    //Function for get topRatedExperiences( callback for home page )
    private function topRatedExperiences(){
        return Experiences::with([
            'category'=> function($model){
                $model->select(['id','name']);
            }
        ])
        ->where(['status'=>'1'])
        ->select([
            'id','category_id','user_id','title','sub_title','slug','experiences_image_url',
            'price','duration','duration_type','group_size','activity_level','featured'
        ])
        ->orderBy('id','DESC')->limit(5)->get()->all();
    }


     /**
     * Function for get all experiences list
     * @param Request $request
     * @return array
     */
     public function experiences(Request $request){
        return Experiences::with([
            'category'=> function($model){
                    $model->select(['id','name','slug']);
                }
            ])
            ->where(['status'=>'1'])
            ->select([
                'id','category_id','user_id','title','sub_title','slug','experiences_image_url',
                'price','duration','duration_type','group_size','activity_level','featured'
            ])
            ->orderBy('id','DESC')
            ->limit(8)
            ->get()
            ->all();
    }

    /**
     * Function for get experiences list by category id
     * @param Request $request
     * @param $category
     * @return array|mixed
     */
    public function getExperiencesByCateogy(Request $request,$category){
        $cat = Categories::select(['id','slug'])->where(['slug' => $category])->get()->first();
        if(!$cat){
            return [];
        }
        return Experiences::with([
            'category'=> function($model){
                $model->select(['id','name','slug']);
            }
        ])
        ->select([
            'id','category_id','user_id','title','sub_title','slug','experiences_image_url',
            'price','duration','duration_type','group_size','activity_level','featured'
        ])
        ->where(['category_id' => $cat->id ]) 
        ->get()
        ->all();
    }

}
