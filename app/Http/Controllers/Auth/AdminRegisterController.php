<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\Models\User;
use Dirape\Token\Token;


class AdminRegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', ['route' => 'auth.admin.register']);
    }

    public function register(AdminRegisterRequest $request)
    {
        $validated = $request->validated();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'token_verify' => (new Token())->Unique('users', 'token_verify', 60),
            'role' => User::ROLE_ADMIN,
            'status' => User::STATUS_NO_ACTIVE,
        ]);

        return redirect()->route('auth.login')->with('success', __('auth.success'));
    }
}
