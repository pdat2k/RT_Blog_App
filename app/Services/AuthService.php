<?php

namespace App\Services;

use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthInterface
{

    public function getLogin($request = NULL)
    {

        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->route('auth.login')->with('failed', __('auth.failed'));
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated()
    {
        return redirect()->intended();
    }
}