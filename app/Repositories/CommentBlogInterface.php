<?php
namespace App\Repositories;

interface CommentBlogInterface
{

    public function getComments($id);

    public function deleteComment($id);

    public function createComment($user_id, $blog_id, $comment);
}
