<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller

{
     public function likeReview(Review $review)
    {
        $review = Review::findOrFail($review->id);
        $user = auth()->user();

        if ($user->likes()->where('review_id', $review->id)->exists()) {
            return response()->json(['message' => 'Already liked'], 400);
        }

        $user->likes()->attach($review);

        return redirect('/');
    }
        
        public function unlikeReview(Review $review)
    {
        $review = Review::findOrFail($review->id);
        $user = auth()->user();

        if (!$user->likes()->where('review_id', $review->id)->exists()) {
            return response()->json(['message' => 'Not liked yet'], 400);
        }

        $user->likes()->detach($review);

        return redirect('/');
    }
}
