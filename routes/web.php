<?php

use App\Models\Room;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProfileController;

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
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admins/create', function () {
    return Inertia::render('Admin/Create');
})->name('admins.create');

// define room routes
Route::get('/rooms/create', function () {
    return Inertia::render('Rooms/Create');
})->name('rooms.create');

Route::get('/rooms/edit', function () {
    return Inertia::render('Rooms/Edit');
})->name('rooms.edit');
Route::get('/rooms', function () {
    return Inertia::render('Rooms/Index');
})->name('rooms');

Route::get('/rooms/details/{id}',function($id){
    // first fetch the data
    $room = Room::find($id);
return Inertia::render('Rooms/Details',[
    'room' => $room,
]);
})->name('roomDetails');

Route::get('/roomType', function () {
    return Inertia::render('Rooms/RoomType');
})->name('room.type');


// admin Panel
Route::get('/adminPanel', function () {
    return Inertia::render('Admin/Panel');
})->name('panel');

Route::get('/response', function () {
    return Inertia::render('Admin/Response');
})->name('response');

Route::get('/issue', function () {
    return Inertia::render('Guest/Issue');
})->name('issue');

Route::get('/guest/create', function () {
    return Inertia::render('Guest/AssignRoom');
})->name('guest.assignRoom');


require __DIR__.'/auth.php';
