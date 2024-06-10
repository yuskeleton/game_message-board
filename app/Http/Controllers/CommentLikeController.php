<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Http\Request;

class CommentLikeController extends Controller

{
     public function likeComment(Comment $comment)
    {
        $comment = Comment::findOrFail($comment->id);
        $user = auth()->user();

        if ($user->likes()->where('comment_id', $comment->id)->exists()) {
            return response()->json(['message' => 'Already liked'], 400);
        }

        $user->likes()->attach($comment);

        return redirect('/');
    }
        
        public function unlikeComment(Comment $comment)
    {
        $comment = Comment::findOrFail($comment->id);
        $user = auth()->user();

        if (!$user->likes()->where('comment_id', $comment->id)->exists()) {
            return response()->json(['message' => 'Not liked yet'], 400);
        }

        $user->likes()->detach($comment);

        return redirect('/');
    }
}