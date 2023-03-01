<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Interfaces\AuthInterface;

class LoginController extends Controller
{

    private $reportService;

    public function __construct(AuthInterface $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        return $this->reportService->getLogin($request);
    }
}