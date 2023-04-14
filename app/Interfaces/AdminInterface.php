<?php

namespace App\Interfaces;

interface AdminInterface
{
    public function listUser();

    public function findUser($id);

    public function removeUser($id);

    public function findRole();

    public function updateUser($request, $id);
}
