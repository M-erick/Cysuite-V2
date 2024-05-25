<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{

    public function index()
  {
      $guests = User::whereIn('role_id', [1])->get();
      return response()->json($guests);
  }

  public function show($id)
  {
      $guest = User::find($id);
      if ($guest) {
          if (in_array($guest->role, ['guest'])) {
              return response()->json($guest);
          } else {
              return response()->json(['message' => 'Guest not found'], 404);
          }
      } else {
          return response()->json(['message' => 'Guest  not found'], 404);
      }
  }
  public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id',
        'rooms' => 'array',
        'rooms.*' => 'exists:rooms,id',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    $guest = User::findOrFail($request->input('user_id'));

    if (!in_array($guest->role_id, [Role::where('name', 'guest')->first()->id])) {
        return response()->json(['message' => 'The selected user is not a guest'], 422);
    }

    // Attach rooms to the guest
    if ($request->has('rooms')) {
        $guest->guestRooms()->sync($request->rooms);
    }

    return response()->json($guest, 201);
}

public function update(Request $request, $id)
{
    $guest = User::findOrFail($id);

    if (!in_array($guest->role_id, [Role::where('name', 'guest')->first()->id])) {
        return response()->json(['message' => 'Guest not found'], 404);
    }

    $validator = Validator::make($request->all(), [
        'rooms' => 'array',
        'rooms.*' => 'exists:rooms,id',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    // Attach rooms to the guest
    if ($request->has('rooms')) {
        $guest->guestRooms()->sync($request->rooms);
    }

    return response()->json($guest);
}


public function destroy($id)
  {
      $admin = User::findOrFail($id);

      if (!in_array($admin->role, ['normal_admin', 'supervisor_admin'])) {
          return response()->json(['message' => 'Admin not found'], 404);
      }

      $admin->delete();

      return response()->json(['message' => 'Admin deleted successfully']);
  }



}
