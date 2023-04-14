<?php

namespace App\Interfaces;

interface BlogInterface
{
    public function list($categoryId, $search);

    public function category();

    public function create($request);

    public function detail($id);

    public function delete($id);

    public function findBlog($id);

    public function updateBlog($request, $id);
}
