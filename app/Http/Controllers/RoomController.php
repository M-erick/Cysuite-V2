<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

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
        ]);
        // then we store

        $room = Room::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'price'=>$request->price,
           'size'=>$request->size,
           'is_occupied'=>$request->is_occupied,
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
        ]);

        $room = Room::find($id);
        $room->update($request->all());
        return response()->json(['message' => 'Room not updated']);
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
