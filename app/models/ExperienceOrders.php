<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ExperienceOrders extends Model
{
    protected $table = 'experiences_order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'experiences_id', 'user_id', 'payment_id','experience_price','experience_adons_price',
        'net_pay','experience_adons_ids','experience_adons_detail','experience_avl_id','experience_start_date',
        'experience_end_date','schedule_detail','total_guest_adults','total_guest_children','total_guest_infants'
    ];
}
