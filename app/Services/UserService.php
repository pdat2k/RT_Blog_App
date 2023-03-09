<?php

namespace App\Services;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Str;

class UserService implements UserInterface
{

    public function getRegister($request = NULL, int $role)
    {
        $validated = $request->validated();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'token_verify' => Str::random(60),
            'role' => $role,
            'status' => User::STATUS_NO_ACTIVE,
        ]);
    }
}