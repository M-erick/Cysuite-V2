<?php

namespace App\Http\Controllers;

use App\Services\RatingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RatingController extends Controller
{
    protected $ratingService;

    public function __construct(RatingService $ratingService)
    {
        $this->ratingService = $ratingService;
    }

    public function index()
    {
        $averageRatings = $this->ratingService->getAverageRatings();
        return response()->json($averageRatings);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'rated_user_id' => 'required|exists:users,id',
                'rating' => 'required|integer|between:1,5',
            ]);

            $rating = $this->ratingService->createRating($validatedData);
            return response()->json($rating, 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->getMessage(), 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create rating', 'error' => $e->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $rating = $this->ratingService->getRatingById($id);
            return response()->json($rating);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Rating not found', 'error' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'rating' => 'required|integer|between:1,5',
            ]);

            $rating = $this->ratingService->updateRating($id, $validatedData);
            return response()->json($rating);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update rating', 'error' => $e->getMessage()], $e->getCode());
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->ratingService->deleteRating($id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete rating', 'error' => $e->getMessage()], $e->getCode());
        }
    }
}
