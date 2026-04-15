<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
            'is_approved' => false,
        ]);

        return back()->with('success', 'Комментарий отправлен на модерацию.');
    }

    public function destroy(Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'У вас нет прав для удаления этого комментария.');
        }

        $comment->delete();

        return back()->with('success', 'Комментарий удален.');
    }
}
