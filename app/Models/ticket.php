<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'event_id',
        'user_id',
        'num_tickets',
    ];

    public function booking()
    {
        return $this->belongsTo(bookings::class);
    }

    public function event()
    {
        return $this->belongsTo(events::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
