<?php

namespace App\Http\Controllers;

use App\Models\bookings;
use App\Models\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    public function index(){
        $events = events::all();
        // $booking = bookings::all();
        return view('user.index', compact( 'events'));
    }

    public function reserve(Events $events, Request $request){
        
        $request->validate([
            'num_people' => 'required|numeric|min:1',
        ]);

        bookings::create([
            'num_people' => $request->input('num_people'),
            'event_id' => $events->id,
            'user_id' => Auth::user()->id,
            
        ]);
        // if($events->available_tickets <= 0){
        //     return redirect()->back()->with('error', 'No tickets available');
        // }

        $input = $request->input('num_people');

        if($input > $events->available_tickets){
            return redirect()->back()->with('error', 'No available seats for this event.');
        }else{
        $decrementValue = $request->input('num_people');

        $events->available_tickets -= $decrementValue;
        $events->save();
    }

        return redirect('/user');
    }



    public function reservations()
    {
        $events = Events::join('bookings', 'events.id', '=', 'bookings.event_id')
        ->join('users', 'bookings.user_id', '=', 'users.id')
            ->where('events.isAuto', 0)
            ->select('events.title', 'events.description', 'events.date', 'bookings.status', 'users.name as user_name')
            ->get();
    
        return view('organizer.reservation', compact('events'));
    }
    }
