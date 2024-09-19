<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;

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
            'hotels' => Hotel::where('status', 1)->get(),

        ];
        return view($this->theme . 'home', $data);
    }


    public function hotel($id)
    {
        $hotel = Hotel::find($id);
        $data = [
            'title' => $hotel->name,
            'hotel' => $hotel,
            'rooms' => $hotel->rooms()->where('status', 1)->get(),
        ];
        return view($this->theme . 'hotel', $data);
    }
}
