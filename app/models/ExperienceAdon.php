<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ExperienceAdon extends Model
{
    protected $table = 'experience_adons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'experiences_id', 'name', 'description','price'
    ];


}
