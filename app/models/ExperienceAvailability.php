<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ExperienceAvailability extends Model
{
    protected $table = 'experience_availability';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'experiences_id', 'year', 'month','date'
    ];
}
