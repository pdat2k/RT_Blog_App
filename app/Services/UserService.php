<?php

namespace App\Services;

use App\Interfaces\UserInterface;
use App\Interfaces\VerifyMailInterface;
use App\Models\User;
use Illuminate\Support\Str;

class UserService implements UserInterface
{
    public function createUser($request = NULL, int $role)
    {
        $validated = $request->validated();

        return User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'token_verify' =>  Str::random(60),
            'role' => $role,
            'status' => User::STATUS_NO_ACTIVE,
        ]);
    }

    public function findUser($column, $operator = NULL, $value = NULL)
    {
        return  User::where($column, $operator, $value)->firstOrFail();
    }

    public function updateUser($id, $request)
    {
        $user = $this->findUser('id', $id);
        $user->update($request);
        return $user;
    }

}
