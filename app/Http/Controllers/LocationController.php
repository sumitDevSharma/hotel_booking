<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class LocationController extends Controller
{


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
        $title = 'Manage Locations';
        return view('admin.locations.index', compact( 'title'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);  
        }

        Location::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return response()->json(['status' => 200, 'message' => 'Location created successfully']);
    }

    
  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);  
        }



        $location->update($request->all());

        return response()->json(['status' => 200, 'message' => 'Location updated successfully']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return response()->json(['status' => 200, 'message' => 'Location deleted successfully']);
    }


    public function getLocationsAjax()
    {
        $locations = Location::query();
        return DataTables::of($locations)
            ->addColumn('action', function($location){
                $actionBtn = '<div class="text-end">
                    <a href="javascript:void(0)" class="btn btn-sm  btn-primary editlocationbtn" data-data="' . htmlspecialchars(json_encode($location), ENT_QUOTES, 'UTF-8') . '">
                       Edit
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger deletelocationbtn" data-id="' . $location->id . '">
                         Delete
                    </a>
                </div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    
    
}
