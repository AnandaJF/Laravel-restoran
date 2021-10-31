<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'foodname',
        'quantity',
        'price',
        'name',
        'table',
        'noted',
        'status',
    ];

}
