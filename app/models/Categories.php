<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'experience_categories';
    protected $appends = ['image'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'title', 'description','slug','category_image_url',
        'category_video_url','status','featured','featured_date'
    ];

    public function getImageAttribute($value)
    {
        if($this->category_image_url!=''){
            return asset($this->category_image_url);
        }
        return null;
    }


}
