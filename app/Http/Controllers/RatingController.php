<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $ratings = Rating::all();


        $groupedRatings = $ratings->groupBy('rated_user_id');


        $averageRatings = [];
        foreach ($groupedRatings as $ratedUserId => $userRatings) {
            $totalRating = $userRatings->sum('rating');
            $numberOfRatings = $userRatings->count();


            $averageRating = $numberOfRatings > 0 ? $totalRating / $numberOfRatings : 0;
            $formattedAverageRating = number_format($averageRating, 1);

            // Store the average rating for this user
            $averageRatings[] = [
                'rated_user_id' => $ratedUserId,
                'average_rating' => $formattedAverageRating
            ];
        }

        // Return the average ratings as JSON response
        return response()->json($averageRatings);
    }


    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'rated_user_id' => 'required|exists:users,id',
                'rating' => 'required|integer|between:1,5',
            ]);

            $ratedUser = User::find($request->input('rated_user_id'));

            //  the role IDs for normal_admin and supervisor_admin are 2 and 3 respectively
            $allowedRoleIds = [2, 3];


            if (!in_array($ratedUser->role_id, $allowedRoleIds)) {
                return response()->json(['message' => 'The rated user must be either a normal admin or a supervisor admin'], 422);
            }

            $rating = new Rating();
            $rating->user_id = $request->input('user_id');
            $rating->rated_user_id = $request->input('rated_user_id');
            $rating->rating = $request->input('rating');
            $rating->save();

            return response()->json($rating, 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->getMessage(), 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create rating', 'error' => $e->getMessage()], 500);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $rating = Rating::findOrFail($id);
        return response()->json($rating);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $request->validate([
                'rating' => 'required|integer|between:1,5', // Assuming rating scale from 1 to 5
            ]);

            $rating = Rating::findOrFail($id);

            // Ensure the current user can only update their own ratings
            if ($rating->user_id !== Auth::id()) {
                return response()->json(['message' => 'Unauthorized'], 403);
            }

            $rating->update($request->all());

            return response()->json($rating);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update rating'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $rating = Rating::findOrFail($id);

            // Ensure the current user can only delete their own ratings
            if ($rating->user_id !== Auth::id()) {
                return response()->json(['message' => 'Unauthorized'], 403);
            }

            $rating->delete();

            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete rating'], 500);
        }

    }
}
