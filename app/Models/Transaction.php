<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'customer_id',
        'order_id',
        'mode',
        'status',
        'created_at',
        'updated_at'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
