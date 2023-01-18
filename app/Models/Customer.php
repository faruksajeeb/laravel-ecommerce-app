<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Customer  extends Authenticatable
{
    use HasFactory;
    protected $guard = 'customer';
    protected $hidden = [
        'password', 'remember_token',
  ];
  protected  $fillable=[
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
