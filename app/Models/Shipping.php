<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $table = "shippings";
    protected $primaryKey = 'id';
    
    protected $fillable = [
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
        'created_by',
        'updated_by'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
