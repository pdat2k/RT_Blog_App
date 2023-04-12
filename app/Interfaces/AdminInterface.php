<?php

namespace App\Interfaces;

interface AdminInterface
{
    public function listUser();

    public function findUser($id);
}
