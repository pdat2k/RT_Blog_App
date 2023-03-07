<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Dirape\Token\Token;

class UserRegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', ['route' => 'auth.user.register']);
    }

    public function register(UserRegisterRequest $request)
    {
        $validated = $request->validated();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'token_verify' => (new Token())->Unique('users', 'token_verify', 60),
            'role' => User::ROLE_USER,
            'status' => User::STATUS_NO_ACTIVE,
        ]);

        return redirect()->route('auth.login')->with('success', __('auth.success'));
    }
}
