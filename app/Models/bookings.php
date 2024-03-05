<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'num_people',
        'event_id',
        'status',
        'user_id',
        'event_id',
    ];
}
