<?php

namespace App\Http\Controllers;

use App\Models\bookings;
use App\Models\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\categories;


class BookingsController extends Controller
{
    public function index(){
        $categories = categories::all();
        $events = events::all();
        // $booking = bookings::all();
        return view('user.index', compact( 'events', 'categories'));
    }

    public function reserve(Events $events, Request $request){
        
        $request->validate([
            'num_people' => 'required|numeric|min:1',
            
        ]);

        $events = Events::find($request->input('event_id'));
        if($events->isAuto == 1){
            bookings::create([
                'num_people' => $request->input('num_people'),
                'event_id' => $events->id,
                'user_id' => Auth::user()->id,
                'isValid' => 1,
            ]);
        }else{
            bookings::create([
                'num_people' => $request->input('num_people'),
                'event_id' => $events->id,
                'user_id' => Auth::user()->id,
            ]);
        }
        
        
        $input = $request->input('num_people');

        if($input > $events->available_tickets){
            return redirect()->back()->with('error', 'No available seats for this event.');
        }else{
        $decrementValue = $request->input('num_people');

        $events->available_tickets -= $decrementValue;
        $events->save();
    }
         $reservationId = bookings::latest()->first()->id;
         return redirect()->route('simple-qrcode', $reservationId);
    }



    public function reservations()
    {

        $user = Auth::user();
    

        $organizerEvents = events::where('user_id', $user->id)->pluck('id');
    
        $bookings = bookings::join('events', 'bookings.event_id', '=', 'events.id')
            ->where('events.isAuto', 0)
            ->whereIn('events.id', $organizerEvents)
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->select('bookings.*', 'events.title', 'events.description', 'events.date', 'users.name as user_name')
            ->get();
    
        return view('organizer.reservation', compact('bookings'));
    }
    

    public function accept($id){
        $event = bookings::find($id);
        bookings::where('id', $id)->update(['isValid' => 1]);
        $event->save();
        return redirect('/reservations');
    }


    public function history(){
        $bookings = bookings::join('events', 'bookings.event_id', '=', 'events.id')->where('bookings.user_id', Auth::user()->id)
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->select('bookings.*', 'events.title', 'events.description', 'events.date', 'events.location', 'users.name as user_name')
            ->get();
    
        return view('user.myhistory', compact('bookings'));
    }

    public function myreservation(){
        $bookings = bookings::join('events', 'bookings.event_id', '=', 'events.id')->where('bookings.user_id', Auth::user()->id)
        ->select('bookings.*', 'events.title', 'events.description', 'events.date', 'events.location')
        ->get();
        return view('user.reservation', compact('bookings'));
    }

    public function cancelReservation(Bookings $booking, Request $request) {

        $reservation = bookings::find($booking->reserv_id);
    
        if ($reservation) {
            
            $reservation->available_seats++;
    
            
            $reservation->save();
        }
    
        $booking->status = $request->input('status');
        $booking->save();
    
        return redirect()->route('user.reservation')->with('success', 'User status updated successfully');
    }
}

