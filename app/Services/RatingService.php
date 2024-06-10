<?php

namespace App\Services;

use App\Models\User;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RatingService
{
    public function getAverageRatings()
    {
        $ratings = Rating::all();
        $groupedRatings = $ratings->groupBy('rated_user_id');
        $averageRatings = [];

        foreach ($groupedRatings as $ratedUserId => $userRatings) {
            $totalRating = $userRatings->sum('rating');
            $numberOfRatings = $userRatings->count();
            $averageRating = $numberOfRatings > 0 ? $totalRating / $numberOfRatings : 0;
            $formattedAverageRating = number_format($averageRating, 1);

            $averageRatings[] = [
                'rated_user_id' => $ratedUserId,
                'average_rating' => $formattedAverageRating
            ];
        }

        return $averageRatings;
    }

    public function createRating(array $data)
    {
        $ratedUser = User::find($data['rated_user_id']);
        $allowedRoleIds = [2, 3];

        if (!in_array($ratedUser->role_id, $allowedRoleIds)) {
            throw ValidationException::withMessages(['rated_user_id' => 'The rated user must be either a normal admin or a supervisor admin']);
        }

        $rating = new Rating();
        $rating->user_id = $data['user_id'];
        $rating->rated_user_id = $data['rated_user_id'];
        $rating->rating = $data['rating'];
        $rating->save();

        return $rating;
    }

    public function getRatingById(string $id)
    {
        return Rating::findOrFail($id);
    }

    public function updateRating(string $id, array $data)
    {
        $rating = Rating::findOrFail($id);

        if ($rating->user_id !== Auth::id()) {
            throw new \Exception('Unauthorized', 403);
        }

        $rating->update($data);
        return $rating;
    }

    public function deleteRating(string $id)
    {
        $rating = Rating::findOrFail($id);

        if ($rating->user_id !== Auth::id()) {
            throw new \Exception('Unauthorized', 403);
        }

        $rating->delete();
    }
}
