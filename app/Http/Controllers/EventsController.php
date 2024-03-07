<?php

namespace App\Http\Controllers;

use App\Models\events;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\categories;

class EventsController extends Controller
{
    public function index(){
        $events = events::all()->where('user_id', Auth::user()->id);

        return view('organizer.index', compact('events'));
    }
    public function create()
    {
        $organizer= User::where('id', Auth::user()->id)->first();
        $categories = categories::all();
        return view('events.addevent' , compact('organizer','categories'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
            'available_tickets' => 'required',
            'category_id' => 'required',
            
        ]);

        $event = new events();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->available_tickets = $request->available_tickets;
        $event->category_id = $request->category_id;
        $event->user_id = Auth::user()->id;
        $event->save();
        return redirect('/dashboard');
    }

    public function filtre(Request $request){
        $categories = categories::all();
        
        $query = events::query();
    
        
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }
    
        
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
    
        $events = $query->get();
    
        return view('user.filtre', compact('events', 'categories'));
    }
    
    public function events(){

        $events = events::all()->where('isvalid', 0);

        return view('admin.events.index', compact('events'));
    }

    public function valid($id){
        $event = events::find($id);
        $event->isvalid = 1;
        $event->save();
        return redirect('/admin/events');
    }
}
