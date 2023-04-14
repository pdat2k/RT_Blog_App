<?php

namespace App\Services;

use App\Interfaces\BlogInterface;
use App\Models\Blog;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogService implements BlogInterface
{
    public function list($categoryId, $search)
    {
        try {
            $categories = Category::pluck('title', 'id');
            $blogs = Blog::with('user')
                ->where('status', Blog::STATUS_PUBLIC)
                ->orderBy('updated_at', 'desc');


            if ($categoryId) {
                $blogs->where('category_id', $categoryId);
            }

            if ($search) {
                $blogs->where('title', 'like', '%' . $search . '%');
            }

            $blogs = $blogs->paginate(config('services.perPage'));

            return [
                'categories' => $categories,
                'blogs' => $blogs,
            ];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function category()
    {
        return Category::pluck('title', 'id');
    }

    public function create($request)
    {
        try {
            $imagePath = null;

            if (isset($request->image)) {
                $image = $request->image->store('public/images');
                $imagePath = Storage::url($image);
            }

            Blog::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->categoryId,
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
                'status' => Blog::STATUS_PENDING
            ]);

            return redirect()->route('user.home');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function detail($id)
    {
        try {
            $blogDetail = $this->findBlog($id);
            $blogRelated = Blog::where(function ($query) use ($blogDetail) {
                $query->where('content', 'like', '%' . $blogDetail->title . '%')
                    ->orWhere('title', 'like', '%' . $blogDetail->title . '%');
            })
                ->whereNotIn('id', [$blogDetail?->id])
                ->where('status', Blog::STATUS_PUBLIC)
                ->take(config('services.takeNumber'))
                ->get();
            $comments = $blogDetail?->comments()->orderBy('created_at', 'desc')->get();

            return [
                'blog' => $blogDetail,
                'related' => $blogRelated,
                'comments' => $comments,
            ];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $blog = $this->findBlog($id);
            if ($blog->user->id === Auth::user()->id) {
                if ($blog->delete()) {
                    return back()->with('success', 'Delete blog successfully');
                } else {
                    return back()->with('error', 'Can\'t delete Blog');
                }
            } else {
                abort(403, 'You do not have permission to delete this post');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function findBlog($id)
    {
        return Blog::find($id);
    }

    public function updateBlog($request, $id)
    {
        try {
            $imagePath = null;

            if (isset($request->image)) {
                $image = $request->image->store('public/images');
                $imagePath = Storage::url($image);
            } else {
                $imagePath = $this->findBlog($id)->image;
            }

            if ($this->findBlog($id)->user_id === Auth::user()->id) {
                Blog::where('id', $id)->update([
                    'category_id' => $request->categoryId,
                    'title' => $request->title,
                    'content' => $request->content,
                    'image' => $imagePath,
                    'status' => Blog::STATUS_PENDING
                ]);
            } else {
                return back()->with('error', 'Can\'t update Blog');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
