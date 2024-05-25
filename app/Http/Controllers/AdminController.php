<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    // commented the below section first to prevent security:implement it later

    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    //     $this->middleware('check.supervisor')->only(['create', 'store', 'edit', 'update', 'destroy']);
    // }
  // List all admins
  public function index()
  {
      $admins = User::whereIn('role_id', [2,3])->get();
      return response()->json($admins);
  }
  // Show a specific admin
  public function show($id)
  {
      $admin = User::find($id);
      if ($admin) {
          if (in_array($admin->role, ['normal_admin', 'supervisor_admin'])) {
              return response()->json($admin);
          } else {
              return response()->json(['message' => 'Admin not found'], 404);
          }
      } else {
          return response()->json(['message' => 'Admin not found'], 404);
      }
  }

  // Assign room to admin 
  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'admin_id' => 'required|exists:users,id',
          'rooms' => 'array',
          'rooms.*' => 'exists:rooms,id',
      ]);

      if ($validator->fails()) {
          return response()->json($validator->errors(), 400);
      }

      $admin = User::findOrFail($request->input('admin_id'));

      if (!in_array($admin->role_id, [Role::where('name', 'normal_admin')->first()->id, Role::where('name', 'supervisor_admin')->first()->id])) {
          return response()->json(['message' => 'The selected user is not an admin'], 422);
      }

      // Attach rooms to the admin
      if ($request->has('rooms')) {
          $admin->rooms()->sync($request->rooms);
      }

      return response()->json($admin, 201);
  }

  // Update an existing admin
  public function update(Request $request, $id)
{
    $admin = User::findOrFail($id);

    if (!in_array($admin->role_id, [Role::where('name', 'normal_admin')->first()->id, Role::where('name', 'supervisor_admin')->first()->id])) {
        return response()->json(['message' => 'Admin not found'], 404);
    }

    $validator = Validator::make($request->all(), [
        'rooms' => 'array',
        'rooms.*' => 'exists:rooms,id',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    // Attach rooms to the admin
    if ($request->has('rooms')) {
        $admin->rooms()->sync($request->rooms);
    }

    return response()->json($admin);
}


  // Delete an admin
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
