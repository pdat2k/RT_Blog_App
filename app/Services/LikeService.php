<?php

namespace App\Services;

use App\Interfaces\LikeInterface;
use App\Models\Blog;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class LikeService implements LikeInterface
{
    public function addLike($blogId)
    {
        try {
            $user = Auth::user();
            $findBlog = Blog::find($blogId)->likes()->where('user_id', $user->id)->first();
            $url = route('user.likes.add');

            if (!$findBlog) {
                $user->likes()->attach($blogId);
                $iconClass = 'fa-sharp fa-solid fa-heart detail-iconHeart-active';
            } else {
                $user->likes()->detach($blogId);
                $iconClass = 'fa-regular fa-heart detail-iconHeart';
            }

            $numberLikes = Blog::find($blogId)->likes->count();

            return '<button class="detail-heart-btn" data-url="' . $url . '" data-id="' . $blogId . '">
                        <i class="' . $iconClass . '"></i>
                    </button>
                    <span class="detail-numberHeart">' . $numberLikes . ' likes</span>';
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
