<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {

        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->route('auth.login')->with('failed', trans('auth.failed'));
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(LoginRequest $request, $user)
    {
        return redirect()->intended();
    }
}
