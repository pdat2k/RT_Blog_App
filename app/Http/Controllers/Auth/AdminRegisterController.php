<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
    public function index()
    {
        $route = 'auth.admin.register';
        return view('auth.register', compact('route'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->token_verify = $request->_token;
        $user->role = 2;
        $user->save();

        return redirect()->route('auth.login')->with('success', 'Registration successful!');
    }
}
