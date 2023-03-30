<?php

namespace App\Interfaces;

interface CommentInterface
{
    public function addComment($blogId, $content);

    public function removeComment($id);
}
