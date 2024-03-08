<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\User;
use App\Models\events;
use App\Models\bookings;    
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function index(){
        $categoryCount = categories::count();
        $usersCount = User::count();
        $eventsCount = events::count();
    
        return view('admin.admin', compact('categoryCount', 'usersCount', 'eventsCount'));
    }

    public function statist(){
        $eventsCount = events::where('user_id', Auth::user()->id)->count();
        $reservationsCount = events::where('user_id', Auth::user()->id)
        ->withCount('bookings')
        ->get()
        ->sum('bookings_count');
        return view('organizer.statistics', compact('eventsCount', 'reservationsCount'));
    }
}
