<?php
namespace App\Repositories;

use App\Blogs;

class BlogRepository implements BlogRepositoryInterface
{

    public function get($id)
    {
        return Blogs::find($id);
    }

    public function all()
    {
        return  Blogs::all();
    }

    public function deleteBlog($id)
    {
        $blogs =Blogs::find($id);
        $blogs->delete();
    }


    public function update($id, array $blog_data)
    {
//        Post::find($id)-&gt;update($blog_data);
    }
}
