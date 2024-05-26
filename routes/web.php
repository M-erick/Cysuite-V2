<?php

use App\Models\Room;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        // 'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/rooms/details/{id}', function ($id) {
        // first fetch the data
        $room = Room::find($id);
        return Inertia::render('Rooms/Details', [
            'room' => $room,
        ]);
    })->name('roomDetails');
});
Route::middleware(['auth', 'role:guest'])->group(function () {
    Route::get('/issue', function () {
        return Inertia::render('Guest/Issue');
    })->name('issue');
});


Route::get('/adminPanel', function () {
    return Inertia::render('Admin/Panel');
})->name('panel');
Route::get('/response', function () {
    return Inertia::render('Admin/Response');
})->name('response');
// admin Panel:supervisor_admin permissions
Route::middleware(['auth', 'role:supervisor_admin'])->group(function () {


    Route::get('/rooms/create', function () {
        return Inertia::render('Rooms/Create');
    })->name('rooms.create');
    Route::get('/admins/create', function () {
        return Inertia::render('Admin/Create');
    })->name('admins.create');

    // define room routes

    Route::get('/rooms/edit', function () {
        return Inertia::render('Rooms/Edit');
    })->name('rooms.edit');
    Route::get('/guest/create', function () {
        return Inertia::render('Guest/AssignRoom');
    })->name('guest.assignRoom');
});

// normal admin role assignment
Route::middleware(['auth', 'role:normal_admin'])->group(function () {

});

Route::get('/rooms', function () {
    return Inertia::render('Rooms/Index');
})->name('rooms');



Route::get('/roomType', function () {
    return Inertia::render('Rooms/RoomType');
})->name('room.type');

// first install laravel email feature
// i need to define routes for email verification

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/email/verify', function () {
    return Inertia::render('Auth/VerifyEmail');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');






require __DIR__ . '/auth.php';
