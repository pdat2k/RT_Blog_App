<?php

namespace App\Services;

use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthInterface
{

    public function login($request = NULL)
    {
        $credentials = $request->getCredentials();
        $rememberPassword = $request->has('remember_password');

        if (!Auth::validate($credentials)) {
            return redirect()->route('user.login')->with('failed', __('auth.failed'));
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if ($rememberPassword) {
            Auth::login($user, $rememberPassword);
        } else {
            Auth::login($user);
        }

        return redirect()->intended();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}
