<?php

namespace App\Http\Controllers;

use App\Repositories\CommentBlogInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class CommentsController extends Controller
{
    protected $comments;

    public function __construct(CommentBlogInterface $comments)
    {
        $this->comments = $comments;
    }

    public function showComments()
    {
        $id = Input::get('blog_id');
        $comments = $this->comments->getComments($id);
        return view('home', $comments);
    }

    public function createComment(Request $request)
    {
        $user_id = Auth::id();
        $blog_id = Input::get('blog_id');
        $comment = $request->input('comment');
        $this->comments->createComment($user_id, $blog_id, $comment);
        return redirect('/home');
    }
}
