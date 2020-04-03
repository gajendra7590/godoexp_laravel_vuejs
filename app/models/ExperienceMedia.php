<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ExperienceMedia extends Model
{
    protected $table = 'media';
    protected $appends = ['image'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'experiences_id', 'image_name', 'image_mime','image_size','image_url'
    ];

    public function getImageAttribute($value)
    {
        if($this->image_url!=''){
            return url('/').'/'.$this->image_url;
        }
        return null;
    }
}
