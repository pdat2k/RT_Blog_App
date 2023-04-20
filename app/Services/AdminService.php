<?php

namespace App\Services;

use App\Interfaces\AdminInterface;
use App\Models\Blog;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Storage;

class AdminService implements AdminInterface
{
    public function listUser()
    {
        try {
            return User::where('role', User::ROLE_USER)->get();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function findUser($id)
    {
        return User::findOrFail($id);
    }

    public function removeUser($id)
    {
        $user = $this->findUser($id);
        $blogs = $user->blogs;
        foreach ($blogs as $blog) {
            $blog->delete();
            $blog->comments()->delete();
        }
        $user->comments()->delete();
        $user->likes()->detach();
        $user->delete();
    }

    public function findRole()
    {
        $role = ['User' => User::ROLE_USER, 'Admin' => User::ROLE_ADMIN];
        $status = ['Active' => User::STATUS_ACTIVE, 'No Active' => User::STATUS_NO_ACTIVE];
        return [$role, $status];
    }

    public function updateUser($request, $id)
    {

        try {
            $imagePath = null;
            if (isset($request->avatar)) {
                $image = $request->avatar->store('public/images');
                $imagePath = Storage::url($image);
            } else {
                $imagePath = $this->findUser($id)->avatar;
            }

            User::find($id)->update([
                'avatar' => $imagePath,
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'role' => $request['role'],
                'status' => $request['status']
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
