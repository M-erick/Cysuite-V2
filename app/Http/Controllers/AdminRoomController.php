<?php

namespace App\Http\Controllers;

use App\Models\AdminRoom;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // EagerLoading
        $adminRooms = AdminRoom::with(['room','user'])->paginate(10);
        return response()->json($adminRooms);
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
        $adminRoom = AdminRoom::find($id);
        return response()->json($adminRoom);
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
