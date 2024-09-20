<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Room, Hotel,RoomImage};
use App\Http\Traits\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RoomController extends Controller
{
    use Upload;
    public function __construct()
    {
        if(Auth::user()->role != 'admin') {
            abort(403);
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Manage Rooms';
        return view('admin.rooms.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Add Room',
            'hotels' => Hotel::all()
        ];
        return view('admin.rooms.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required | unique:rooms',
            'hotel_id' => 'required',
            'room_type' => 'required',
            'price_per_night' => 'required',
            'max_guests' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }

        $rooms = Room::create([
            'name' => $request->name,
            'hotel_id' => $request->hotel_id,
            'room_type' => $request->room_type,
            'price_per_night' => $request->price_per_night,
            'max_guests' => $request->max_guests,
            'status' => $request->status
        ]);


        // Upload images

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $location = asset_path('/uploads/rooms');
            
                $filename = $this->uploadImage($image, $location, $size = null, $old = null, $thumb = null, $filename = null);
                $imagePath = 'uploads/rooms/' . $filename;
                $rooms->images()->create(['image_path' => $imagePath]);
            }   
        }
        
        return response()->json(['status' => 200, 'message' => 'Room Added successfully','redirect_url' => route('rooms.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $data = [
            'title' => 'Edit Room',
            'hotels' => Hotel::all(),
            'room' => $room
        ];
        return view('admin.rooms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | unique:rooms,name,'.$room->id,
            'hotel_id' => 'required',
            'room_type' => 'required',
            'price_per_night' => 'required',
            'max_guests' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }

        $room->update([
            'name' => $request->name,
            'hotel_id' => $request->hotel_id,
            'room_type' => $request->room_type,
            'price_per_night' => $request->price_per_night,
            'max_guests' => $request->max_guests,
            'status' => $request->status
        ]);

        // Upload images

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $location = asset_path('/uploads/rooms');
            
                $filename = $this->uploadImage($image, $location, $size = null, $old = null, $thumb = null, $filename = null);
                $imagePath = 'uploads/rooms/' . $filename;
                $room->images()->create(['image_path' => $imagePath]);
            }   
        }

        return response()->json(['status' => 200, 'message' => 'Room updated successfully','redirect_url' => route('rooms.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return response()->json(['status' => 200, 'message' => 'Room deleted successfully']);   
    }


    public function getRoomsAjax()
    {
        $rooms = Room::with('hotel', 'images');
        return DataTables::of($rooms)
            ->addColumn('action', function($rooms){
                $actionBtn = '<div class="text-end">
                    <a href="'.route('rooms.edit',$rooms->id).'" class="btn btn-sm  btn-primary">
                       Edit
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteHotelbtn" data-id="' . $rooms->id . '">
                         Delete
                    </a>
                </div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }


    public function deleteImage(Request $request)
    {
        $image = RoomImage::find($request->id);
        $image->delete();

        $this->removeFile(public_path($image->image_path));
        return response()->json(['status' => 200, 'message' => 'Image deleted successfully']);
    }
}
