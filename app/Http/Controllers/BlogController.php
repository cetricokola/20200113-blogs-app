<?php

namespace App\Http\Controllers;

use App\Blogs;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    protected $blogs;

    public function __construct(BlogRepositoryInterface $blogs)
    {
        $this->blogs = $blogs;
    }


    //get all the blogs
    public function index()
    {
        $blogs = $this->blogs->all();
        return view('home', ['blogs' => $blogs]);
    }

    public function create()
    {
        return view('pages.create_blog');
    }

    public function store(Request $request)
    {
        $blog = new Blogs();
        $title = $request->input('title');
        $blog->user_id = '1';
        $blog->title = $title;
        $blog->body = $request->input('body');
        $blog->save();
        Log::info("New blog is created");
        return redirect('/home');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

        $this->blogs->deleteBlog($id);
        return redirect('/home');
    }

    public function retrieveYourBlogs()
    {
        $blogs = Blogs:: myblogs()->orderBy('created_at')->get();
        return view('home', ['blogs' => $blogs]);
    }
}
