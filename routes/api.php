<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;

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
// Route::get('/users',function (Request $request) {
//     return User::all();
// });

// fetch user details:dummy routes will update this
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

//Guest Routes:Register Should be protected
Route::post('/guest', [GuestController::class, 'store']);
    Route::put('/guest/{id}', [GuestController::class, 'update']);
    Route::delete('/guest/{id}', [GuestController::class, 'destroy']);
// });

// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/guest', [GuestController::class, 'index']);
    Route::get('/guest/{id}', [GuestController::class, 'show']);

// Room routes

Route::get('/rooms', [RoomController::class, 'index']);
Route::post('/rooms', [RoomController::class, 'store']);
Route::get('/rooms/{id}', [RoomController::class, 'show']);
Route::put('/rooms/{id}', [RoomController::class, 'update']);
Route::delete('/rooms/{id}', [RoomController::class, 'destroy']);

Route::get('/room/{roomId}/details', function () {
    // Route accessible only to guests linked to the specified room: using the middleware check.guestAcess
})->middleware('auth:guests', 'check.guestAcess');


// Routes for  issues
    // Route to list all issues
    Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');

    // Route to create a new issue
    Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');
    // Route to view a specific issue
    Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');
    // Route to update an existing issue
    Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');
    Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');

// Routes for responses
Route::post('/issues/{issue}/responses',[ResponseController::class,'store'])->name('responses.store');
Route::get('/issues/{issue}/responses', [ResponseController::class,'index'])->name('responses.index');
Route::get('/issues/{issue}/responses/{response}', [ResponseController::class,'show'])->name('responses.show');
Route::put('/issues/{issue}/responses/{response}', [ResponseController::class,'update'])->name('responses.update');
Route::delete('/issues/{issue}/responses/{response}', [ResponseController::class,'destroy'])->name('responses.destroy');


//
//Rating Page:will implement the  route authentication later
// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/ratings', [RatingController::class, 'index']);
    Route::post('/ratings', [RatingController::class, 'store']);
    Route::get('/ratings/{id}', [RatingController::class, 'show']);
    Route::put('/ratings/{id}', [RatingController::class, 'update']);
    Route::delete('/ratings/{id}', [RatingController::class, 'destroy']);
// });
