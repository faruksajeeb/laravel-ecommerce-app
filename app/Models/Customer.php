<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $fillable=[
        'id',
        'customer_name',
        'email',
        'mobile',
        'password',
        'present_address',
        'permenent_address',
        'shipping_address',
        'created_by',
        'updated_by',
        'status'
    ];
}
