<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ExperienceSavedItem extends Model
{
    protected $table = 'experiences_saved';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'experiences_id', 'user_id'
    ];
}
