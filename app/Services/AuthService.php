<?php

namespace App\Services;

use App\Interfaces\AuthInterface;
use App\Models\User;
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

        if ($user->status == User::STATUS_ACTIVE) {
            $rememberPassword ? Auth::login($user, $rememberPassword) : Auth::login($user);
            if ($user->role == User::ROLE_ADMIN) {
                return redirect()->route('admin.home');
            }
            return redirect()->intended();
        } else {
            return redirect()->route('user.login')->with('failed', __('auth.failed'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}
