<?php

namespace App\Http\Controllers;

use App\Models\GuestRoom;
use Illuminate\Http\Request;

class GuestRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guestRooms = GuestRoom::all();
        return response()->json($guestRooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guestRoom = GuestRoom::find($id);
        return response()->json($guestRoom);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
