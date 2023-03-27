<?php

namespace App\Interfaces;

interface VerificationInterface
{
    public function verify($request, $user);
}
