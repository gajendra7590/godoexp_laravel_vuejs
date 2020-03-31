<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $appends = ['image'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_owner', 'company_name', 'company_logo','company_desc','company_phone',
        'company_city','company_state','company_country','company_zip','company_full_address',
        'company_email','company_facebook','company_instagram','company_twiiter','company_pinterest',
        'status',''
    ];


    public function getImageAttribute($value)
    {
        if($this->company_logo!=''){
            return url('/').'/'.$this->company_logo;
        }
        return null;
    }
}
