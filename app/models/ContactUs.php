<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contact_name', 'contact_email', 'contact_phone','contact_message','contact_time',
        'reply_subject','reply_email','reply_body','reply_time','reply_user','is_reply'
    ];

}
