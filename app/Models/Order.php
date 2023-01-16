<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'customer_id',
        'subtotal',
        'discount',
        'tax',
        'total',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'line1',
        'line2',
        'city',
        'province',
        'country',
        'zip_code',
        'status',
        'is_shiffing_different',
        'created_by',
        'updated_by'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function shipping(){
        return $this->hasOne(Shipping::class);
    }

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
}
