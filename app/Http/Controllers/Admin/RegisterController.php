<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\UserInterface;
use App\Interfaces\VerifyMailInterface;
use App\Models\User;

class RegisterController extends Controller
{
    private $userService;
    private $verifyMailService;

    public function __construct(UserInterface $userService, VerifyMailInterface $verifyMailService)
    {
        $this->userService = $userService;
        $this->verifyMailService = $verifyMailService;
    }

    public function index()
    {
        return view('auth.register', ['route' => 'admin.register.index']);
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userService->createUser($request, User::ROLE_ADMIN);
        $this->verifyMailService->send($user->email, $user->token_verify, $user->created_at);
        return redirect()->route('user.email.verify', ['email' => $user->email]);
    }
}
