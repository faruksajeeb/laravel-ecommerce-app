<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    public $fillable=[
        'id',
        'top_title',
        'title',
        'sub_title',
        'offer',
        'link',
        'image',
        'status',
        'created_by',
        'updated_by'
    ];
}
