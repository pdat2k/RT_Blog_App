<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\UserInterface;
use App\Models\User;

class RegisterController extends Controller
{
    private $reportService;

    public function __construct(UserInterface $reportService)
    {
        $this->reportService = $reportService;
    }

    public function user()
    {
        return view('auth.register', ['route' => 'auth.user.register']);
    }

    public function admin()
    {
        return view('auth.register', ['route' => 'auth.admin.register']);
    }

    public function registerUser(RegisterRequest $request)
    {
        $this->reportService->getRegister($request, User::ROLE_USER);
        return redirect()->route('auth.login')->with('success', __('auth.success'));
    }

    public function registerAdmin(RegisterRequest $request)
    {
        $this->reportService->getRegister($request, User::ROLE_ADMIN);
        return redirect()->route('auth.login')->with('success', __('auth.success'));
    }
}