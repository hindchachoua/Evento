<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiltle',
        'description',
        'date',
        'location',
        'available_seats',
        'status',
        'user_id',
        'category_id',
        'isvalid',
    ];
}
