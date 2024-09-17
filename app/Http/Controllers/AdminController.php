<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, Hotel, Room, Location};


class AdminController extends Controller
{
    public function __construct()
    {
        if(Auth::user()->role != 'admin') {
            abort(403);
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'hotels' => Hotel::count(),
            'rooms' => Room::count(),
            'locations' => Location::count(),
            'users' => User::where('role', 'customer')->count(),
        ];
        return view('admin.dashboard', $data);
    }
}
