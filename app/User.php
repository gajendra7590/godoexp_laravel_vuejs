<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $appends = ['userName','image'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'email_verified_at', 'password', 'profile_photo','phone','gender','dob',
        'city', 'state', 'country', 'zip', 'role_id','password_reset_token','verification_token','last_login','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'password_reset_token', 'verification_token', 'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login' => 'datetime',
    ];

    /**
     * Role Mapping
     */
    public function role() {
        return $this->hasOne('App\models\Roles','id', 'role_id');
    }

    public function getImageAttribute($value)
    {
        if($this->profile_photo!=''){
            return url('/').'/'.$this->profile_photo;
        }
        return null;
    }

    public function getUserNameAttribute($value)
    {
        if($this->first_name!=''){
            return $this->first_name.' '.$this->last_name;
        }
        return null;
    }
}
