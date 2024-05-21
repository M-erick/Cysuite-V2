<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware(['auth:sanctum', 'check.supervisor'])->group(function () {
    Route::post('/admins', [AdminController::class, 'store']);
    Route::put('/admins/{id}', [AdminController::class, 'update']);
    Route::delete('/admins/{id}', [AdminController::class, 'destroy']);
// });

// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admins', [AdminController::class, 'index']);
    Route::get('/admins/{id}', [AdminController::class, 'show']);
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/users',function (Request $request) {
    return User::all();
});


//Guest Routes:Register Should be protected
Route::post('/guests/register', [GuestController::class, 'register']);

Route::post('/guests/login', [GuestController::class, 'login']);

Route::get('/room/{roomId}/details', function () {
    // Route accessible only to guests linked to the specified room: using the middleware check.guestAcess
})->middleware('auth:guests', 'check.guestAcess');

