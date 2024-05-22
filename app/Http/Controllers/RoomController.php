<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return response()->json($rooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the input
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'size' => 'required|integer',
            'price' => 'required|numeric',
            'is_occupied' => 'boolean',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'capacity' => 'required|integer',
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // then we store
        $room = Room::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'price'=>$request->price,
           'size'=>$request->size,
           'is_occupied'=>$request->is_occupied,
           'description'=>$request->description,
           'image'=>$imagePath,
        ]);
        if ($room) {
            return response()->json($room);
        } else {
             return response()->json(['message'=>'Room Failed to be created']);        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::find($id);
        if($room){
            return response()->json($room);
        } else{
            return response()->json(['message' => 'Room not found'], 404);


        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'size' => 'required|integer',
            'price' => 'required|numeric',
            'is_occupied' => 'required|boolean',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'capacity' => 'required|integer',
        ]);

        $room = Room::find($id);
        //  check if room exists first:Hollah
        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        // Handle image upload
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($room->image) {
            Storage::disk('public')->delete($room->image);
        }

        // Store the new image
        $imagePath = $request->file('image')->store('images', 'public');
        $room->image = $imagePath;
    }

    // Update other fields
    $room->name = $request->name;
    $room->type = $request->type;
    $room->size = $request->size;
    $room->price = $request->price;
    $room->is_occupied = $request->is_occupied;
    $room->description = $request->description;
    $room->capacity = $request->capacity;

    $room->save();

    return response()->json(['message' => 'Room updated successfully', 'room' => $room]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json(null, 204);
    }
}
