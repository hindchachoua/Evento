<?php

namespace App\Http\Controllers;

use App\Models\events;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index(){
        return view('events.addevent');
    }
    public function create()
    {
        $organizer= User::where('id', Auth::user()->id)->first();
        $events = events::all();
        return view('events.addevent' , compact('organizer','events'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
            'available_tickets' => 'required',
        ]);

        $event = new events();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->available_tickets = $request->available_tickets;
        $event->organizer_id = Auth::user()->id;
        $event->save();
        return redirect('/dashboard');
    }
}
