<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->theme = template();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'rooms' => Room::where('status', 1)->get(),
            'hotels' => Hotel::where('status', 1)->whereHas('rooms', function ($query) {
                $query->where('status', 1);
            })->get(),

        ];
        return view($this->theme . 'home', $data);
    }


    public function hotel($slug)
    {
        $hotel = Hotel::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [Str::lower($slug)])
        ->first();
        $data = [
            'title' => $hotel->name,
            'hotel' => $hotel,
            'rooms' => $hotel->rooms()->where('status', 1)->get(),
        ];
        return view($this->theme . 'hotel', $data);
    }

    public function booking($slug)
    {
        $room = Room::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [Str::lower($slug)])
        ->first();
        $data = [
            'title' => $room->name,
            'room' => $room,
            'hotel' => $room->hotel,
           
        ];
        return view($this->theme . 'hotel-booking', $data);
    }
}
