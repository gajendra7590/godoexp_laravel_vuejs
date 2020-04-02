<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';
    protected $appends = ['image'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_name', 'client_position', 'client_message','client_image'
    ];

    public function getImageAttribute($value)
    {
        if($this->client_image!=''){
            return url('/').'/'.$this->client_image;
        }
        return null;
    }
}
