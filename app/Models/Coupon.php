<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table='coupons';
    public $fillable=[
        'code',
        'type',
        'value',
        'cart_value',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

}
