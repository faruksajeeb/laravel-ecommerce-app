<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mrpermission extends Model
{
    use HasFactory;

    public $fillable=[
        'id',
        'name',
    ];
}