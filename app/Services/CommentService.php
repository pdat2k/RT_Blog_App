<?php

namespace App\Services;

use App\Interfaces\CommentInterface;
use App\Models\Comment;
use Exception;
use Illuminate\Support\Facades\Auth;

class CommentService implements CommentInterface
{
    public function addComment($blogId, $content)
    {
        try {
            $comment = Comment::create([
                'user_id' => Auth::user()->id,
                'blog_id' => $blogId,
                'content' => $content,
            ]);

            return '<div class="detail-comment-footer">
            <img src="https://images.unsplash.com/photo-1680022546558-550eaf22351e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                alt="detail-author-image" class="detail-author-image">
                <div class="detail-comment-group">
                    <h3 class="detail-content-title">' . $comment->user->name . '
                    </h3>
                    <p class="detail-container-text">' . $comment->content . '</p>
                    <p class="detail-container-text">
                        ' . $comment->time . '
                    </p>
                </div
            </div>';
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function removeComment($id)
    {
        try {
            Comment::where('id', $id)->where('user_id', Auth::user()->id)->delete();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
