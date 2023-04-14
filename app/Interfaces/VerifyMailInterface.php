<?php

namespace App\Interfaces;

interface VerifyMailInterface
{
    public function send($email, $token_verify, $time_create);
}
