<?php

namespace App\Interfaces;

interface UserInterface
{
    public function createUser($request = NULL, int $role);

    public function findUser($column, $operator = NULL, $value = NULL);

    public function updateUser($id, $request);
}
