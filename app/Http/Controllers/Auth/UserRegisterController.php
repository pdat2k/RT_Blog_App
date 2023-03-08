<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Str;

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
            'token_verify' => Str::random(60),
            'role' => User::ROLE_USER,
            'status' => User::STATUS_NO_ACTIVE,
        ]);
        return redirect()->route('auth.login')->with('success', __('auth.success'));
    }
}
