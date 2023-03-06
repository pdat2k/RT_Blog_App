<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt(['email' => $request->name, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        return redirect()->route('auth.login')->with('error', 'Account does not exist!');
    }
}
