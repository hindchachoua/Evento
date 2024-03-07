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
        $bookings = bookings::join('events', 'bookings.event_id', '=', 'events.id')->where('events.isAuto', 0)
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
    }

