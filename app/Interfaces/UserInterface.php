<?php

namespace App\Interfaces;

interface UserInterface
{
    public function getRegister($request = NULL, int $role);
}