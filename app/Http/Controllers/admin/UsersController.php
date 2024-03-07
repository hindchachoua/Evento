<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $userwithuserrole = User::role('user')->get();
        return view('admin.user.index')->with('userwithuserrole', $userwithuserrole);
    }

    public function blockUser(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
    
        // Toggle the is_blocked status
        $user->is_blocked = !$user->is_blocked;
        $user->save();
    
        return redirect()->back()->with('success', 'User blocked/unblocked successfully');
    }

}
