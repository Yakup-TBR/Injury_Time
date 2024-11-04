<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;



class ReviewController extends Controller
{
    public function addReview(Request $request)
    {
        $request->validate([
            'id_kos' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $review = new Review();
        $review->id_kos = $request->input('id_kos');
        $review->user_id = auth()->id();
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->save();


        return response()->json(['message' => 'Review added successfully']);
    }

    public function getReviews($kosId)
    {
        $reviews = Review::where('id_kos', $kosId)->with('user')->get();
        return response()->json($reviews);
    }
}
