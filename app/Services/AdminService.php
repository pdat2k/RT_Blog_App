<?php

namespace App\Services;

use App\Interfaces\AdminInterface;
use App\Models\User;
use Exception;

class AdminService implements AdminInterface
{
    public function listUser()
    {
        try {
            return User::where('role', User::ROLE_USER)->get();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
