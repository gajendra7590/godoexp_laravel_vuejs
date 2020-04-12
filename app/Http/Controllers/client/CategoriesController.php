<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Experiences;
use App\models\Categories;

class CategoriesController extends Controller
{
    public  function index(){

    }

    public function categories(){
        return Categories::selectRaw(
            'EC.id,EC.name,EC.title,EC.slug,EC.category_image_url,EC.featured,
             (SELECT count(E.id) FROM experiences E WHERE E.category_id = EC.id) as total_exp'
        )->from('experience_categories as EC')->orderBy('total_exp','DESC')->get();
    }
}
