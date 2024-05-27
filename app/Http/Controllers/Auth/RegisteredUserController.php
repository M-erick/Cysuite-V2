<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:guest,normal_admin,supervisor_admin',
        ]);

        //
        $roleIds = [
            'guest' => Role::where('name', 'guest')->first()->id,
            'normal_admin' => Role::where('name', 'normal_admin')->first()->id,
            'supervisor_admin' => Role::where('name', 'supervisor_admin')->first()->id,
        ];

        $selectedRoleId = $roleIds[$request->input('role')];
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $selectedRoleId,

        ]);

        event(new Registered($user));

        // uncomment this part when hosting then comment :

        // user should first verify  the email before to log in
        // Auth::login($user);

        // if ($user->role_id == $roleIds['guest']) {
        //     return redirect(RouteServiceProvider::HOME);
        // } elseif (in_array($user->role_id, [$roleIds['normal_admin'], $roleIds['supervisor_admin']])) {
        //     return redirect()->route('panel');
        // }

        // return redirect(RouteServiceProvider::HOME);


        // once registered,redirect the admin  to admin panel.No need for the above role_id checks
        return redirect()->route('panel');


    }
}
