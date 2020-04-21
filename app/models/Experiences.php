<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    protected $table = 'experiences';
    protected $appends = ['image'];


    protected $fillable = [
        'category_id', 'user_id', 'title','sub_title','description',
        'slug','experiences_image_url','experiences_video_url','price',
        'duration','duration_type','group_size','activity_level','country',
        'state','city','latitude','longitude','status','featured','featured_date'
    ];

    public function getImageAttribute($value)
    { 
        if($this->experiences_image_url!=''){
            return asset($this->experiences_image_url);;
        }
        return null;
    }

    //Categories
    public function category() {
        return $this->hasOne('App\models\Categories','id', 'category_id');
    }

    //User
    public function user(){
        return $this->hasOne('App\User','id', 'user_id');
    }

    //media
    public function media() {
        return $this->hasMany('App\models\ExperienceMedia','experiences_id', 'id');
    }

    //adons
    public function adons() {
        return $this->hasMany('App\models\ExperienceAdon','experiences_id', 'id');
    }


}
