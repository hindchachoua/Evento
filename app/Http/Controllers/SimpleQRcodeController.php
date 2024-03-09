<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class SimpleQRcodeController extends Controller
{ 
    // L'action "generate" de la route "simple-qrcode" (GET)
    public function generate($reservationId) {
        // Fetch reservation details based on $reservationId (use the appropriate logic based on your database structure)
        $reservation = Bookings::find($reservationId)->join('events' , 'bookings.event_id' , '=' , 'events.id')->select('bookings.*' , 'events.title' , 'events.description' , 'events.date' , 'events.location')->first();
    
        # Generate a QR code with reservation details
        $qrcode = QrCode::size(200)->generate(json_encode($reservation));
    
        # Send the QR code to the view
        return view("user.simple-qrcode", compact('qrcode' , 'reservation'));
    }
}
