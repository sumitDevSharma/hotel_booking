<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\Upload;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\HotelImage;

class HotelController extends Controller
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
        $title = 'Manage Hotels';
        return view('admin.hotels.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Add Hotel',
            'locations' => Location::all()
        ];
        return view('admin.hotels.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location_id' => 'required',
            'address' => 'required',
            'description' => 'required',
            'status' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }

        $hotel = Hotel::create([
            'name' => $request->name,
            'location_id' => $request->location_id,
            'address' => $request->address,
            'description' => $request->description,
            'status' => $request->status
        ]);


        // Upload images

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $location = asset_path('/uploads/hotels');
            
                $filename = $this->uploadImage($image, $location, $size = null, $old = null, $thumb = null, $filename = null);
                $imagePath = 'uploads/hotels/' . $filename;
                $hotel->images()->create(['image_path' => $imagePath]);
            }   
        }

        return response()->json(['status' => 200, 'message' => 'Hotel created successfully','redirect_url' => route('hotels.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        $data = [
            'title' => 'Edit Hotel (' . $hotel->name . ')',
            'locations' => Location::all(),
            'hotel' => $hotel
        ];
        return view('admin.hotels.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location_id' => 'required',
            'address' => 'required',
            'description' => 'required',
            'status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }

        $hotel->update([
            'name' => $request->name,
            'location_id' => $request->location_id,
            'address' => $request->address,
            'description' => $request->description,
            'status' => $request->status
        ]);

        // Upload images

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $location = asset_path('/uploads/hotels');
                $filename = $this->uploadImage($image, $location, $size = null, $old = null, $thumb = null, $filename = null);
                $imagePath = 'uploads/hotels/' . $filename;
                $hotel->images()->create(['image_path' => $imagePath]);
            }
        }

        return response()->json(['status' => 200, 'message' => 'Hotel updated successfully','redirect_url' => route('hotels.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return response()->json(['status' => 200, 'message' => 'Hotel deleted successfully']);
    }

    
    public function getHotelsAjax()
    {
        $hotels = Hotel::with('location', 'images');
        return DataTables::of($hotels)
            ->addColumn('action', function($hotels){
                $actionBtn = '<div class="text-end">
                    <a href="'.route('hotels.edit',$hotels->id).'" class="btn btn-sm  btn-primary">
                       Edit
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteHotelbtn" data-id="' . $hotels->id . '">
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
        $image = HotelImage::find($request->id);
        $image->delete();

        $this->removeFile(public_path($image->image_path));
        return response()->json(['status' => 200, 'message' => 'Image deleted successfully']);
    }

}
