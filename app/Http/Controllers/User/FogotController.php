<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\UserInterface;
use App\Interfaces\VerifyMailInterface;
use Illuminate\Http\Request;

class FogotController extends Controller
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
        return view('auth.forget');
    }

    public function fogot(Request $request)
    {
        $user = $this->userService->findUser(['email' => $request->email]);
        $this->verifyMailService->send($user->email, $user->token_verify, $user->created_at);
    }
}
