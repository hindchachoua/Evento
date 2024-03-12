<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class SimpleQRcodeController extends Controller
{ 
    public function generate($reservationId) {

        $reservation = Bookings::find($reservationId)->join('events' , 'bookings.event_id' , '=' , 'events.id')->select('bookings.*' , 'events.title' , 'events.description' , 'events.date' , 'events.location')->first();
    
        $qrcode = QrCode::size(200)->generate(json_encode($reservation));
    
        return view("user.simple-qrcode", compact('qrcode' , 'reservation'));
    }
}
