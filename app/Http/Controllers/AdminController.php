<?php

namespace App\Http\Controllers;

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
      $admins = User::whereIn('role', ['normal_admin', 'supervisor_admin'])->get();
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

  // Create a new admin
  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:8',
          'role' => 'required|in:normal_admin,supervisor_admin',
          'rooms' => 'array',
          'rooms.*' => 'required|exists:rooms,id',
      ]);

      if ($validator->fails()) {
          return response()->json($validator->errors(), 400);
      }

      $admin = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'role' => $request->role,
      ]);

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

      if (!in_array($admin->role, ['normal_admin', 'supervisor_admin'])) {
          return response()->json(['message' => 'Admin not found'], 404);
      }

      $validator = Validator::make($request->all(), [
          'name' => 'sometimes|required|string|max:255',
          'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
          'password' => 'sometimes|required|string|min:8',
          'role' => 'sometimes|required|in:normal_admin,supervisor_admin',
          'rooms' => 'array',
          'rooms.*' => 'exists:rooms,id',
      ]);

      if ($validator->fails()) {
          return response()->json($validator->errors(), 400);
      }

      $admin->update($request->only('name', 'email', 'role'));

      if ($request->has('password')) {
          $admin->password = Hash::make($request->password);
          $admin->save();
      }
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
