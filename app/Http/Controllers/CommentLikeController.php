<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
    
    public function likeComment(Review $review, Comment $comment)
    {
        $comment = Comment::findOrFail($comment->id);
        $user = auth()->user();

        if ($user->CommentLike()->where('comment_id', $comment->id)->exists()) {
            return response()->json(['message' => 'Already liked'], 400);
        }

        $user->CommentLike()->attach($comment);

        return redirect('/reviews/' . $review->id .  '/comments');
    }
    
    public function unlikeComment(Review $review, Comment $comment)
    {
        $comment = Comment::findOrFail($comment->id);
        $user = auth()->user();

        if (!$user->CommentLike()->where('comment_id', $comment->id)->exists()) {
            return response()->json(['message' => 'Not liked yet'], 400);
        }

        $user->CommentLike()->detach($comment);

        return redirect('/reviews/' . $review->id .  '/comments');
    }
}