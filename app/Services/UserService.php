<?php

namespace App\Services;

use App\Interfaces\UserInterface;
use App\Interfaces\VerifyMailInterface;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;

class UserService implements UserInterface
{
    public function createUser($request = NULL, int $role)
    {
        try {
            $validated = $request->validated();

            return User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'token_verify' =>  Str::random(60),
                'role' => $role,
                'status' => User::STATUS_NO_ACTIVE,
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function findUser($column, $operator = NULL, $value = NULL)
    {
        try {
            return  User::where($column, $operator, $value)->firstOrFail();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function updateUser($id, $request)
    {
        try {
            $user = $this->findUser('id', $id);
            $user->update($request);
            return $user;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
