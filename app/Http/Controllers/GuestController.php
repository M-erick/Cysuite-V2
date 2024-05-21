<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function register(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

    //   guest record
        $guest = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,

        ]);

        //  success response
        return response()->json(['message' => 'Guest registered successfully']);
    }

    // endpoint is :http://lr-cysuites.test/api/guests/login
    public function login(Request $request)
{
    // Validate request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Authentication process
    if (auth()->attempt($request->only('email', 'password'))) {
        // Authentication successful
        $user = auth()->user();
        return response()->json(['user' => $user]);
    } else {
        // Authentication failed
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}

}
