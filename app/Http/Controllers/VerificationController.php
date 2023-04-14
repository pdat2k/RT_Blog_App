<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use App\Interfaces\VerificationInterface;
use App\Interfaces\VerifyMailInterface;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    private $userService;
    private $verifyMailService;
    private $verificationService;

    public function __construct(UserInterface $userService, VerificationInterface $verificationService, VerifyMailInterface $verifyMailService)
    {
        $this->userService = $userService;
        $this->verificationService = $verificationService;
        $this->verifyMailService = $verifyMailService;
    }

    public function index(Request $request)
    {
        return view('auth.resend', ['email' => $request->email]);
    }

    public function verify(Request $request)
    {
        $user = $this->userService->findUser('token_verify', $request->token_verify);
        return $this->verificationService->verify($request, $user);
    }

    public function resend(Request $request)
    {
        $user = $this->userService->findUser('email', $request->email);
        $this->verifyMailService->send($user->email, $user->token_verify, $user->created_at);
        return redirect()->route('user.email.verify', ['email' => $user->email]);
    }
}
