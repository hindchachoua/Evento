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
}
