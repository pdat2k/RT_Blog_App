<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', ['route' => 'auth.admin.register']);
    }

    public function register(AdminRegisterRequest $request)
    {
        $request->validated();

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
