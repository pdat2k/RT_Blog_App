<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $authService;

    public function __construct(AuthInterface $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('auth.login', ['login' => Auth::user()]);
    }

    public function login(LoginRequest $request)
    {
        return $this->authService->login($request);
    }

    public function logout()
    {
        return $this->authService->logout();
    }
}
