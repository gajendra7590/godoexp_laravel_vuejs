<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'user_roles'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_name', 'role_display_name', 'status','slug'
    ]; 

}
