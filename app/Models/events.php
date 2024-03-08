<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'available_seats',
        'status',
        'user_id',
        'category_id',
        'isvalid',
    ];

    public function category(){
        return $this->belongsTo(categories::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bookings(){
        return $this->hasMany(bookings::class , 'event_id');
    }
}
