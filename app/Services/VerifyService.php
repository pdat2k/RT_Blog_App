<?php

namespace App\Services;

use App\Interfaces\VerificationInterface;
use App\Models\User;
use Carbon\Carbon;
use DateTime;

class VerifyService implements VerificationInterface
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function verify($request, $user)
    {
        $tokenTimeExpire = (new DateTime(date("Y-m-d H:i:s", $request->time_create)))
            ->modify(config('mail.timeout'));
        if ($tokenTimeExpire->getTimestamp() >= Carbon::now()->timestamp) {
            $this->userService->updateUser($user->id, ['status' => User::STATUS_ACTIVE]);
            return redirect()->route('user.login');
        } else {
            return view('auth.error');
        }
    }
}
