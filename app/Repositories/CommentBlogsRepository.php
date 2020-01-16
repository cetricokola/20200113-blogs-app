<?php


namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CommentBlogsRepository implements CommentBlogInterface
{

    public function getComments($id)
    {
        return DB::table('comments_models')->where('blog_id', $id)->get();
    }

    public function deleteComment($id)
    {
        return DB::table('comments_models')->where('id', $id)->delete();
    }

    public function createComment($user_id, $blog_id, $comment)
    {
        return DB::table('comments_models')->insert(
            array('user_id' => $user_id, 'comment' => $comment, 'blog_id' => $blog_id)
        );
    }
}
