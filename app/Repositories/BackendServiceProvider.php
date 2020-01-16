<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

    public
    function register()
    {
        $this->registerBlogRepo();
        $this->registerCommentRepo();

    }
    public function registerCommentRepo()
    {
        return $this->app->bind('App\Repositories\CommentBlogsInterface', 'App\Repositories\CommentBlogRepository');
    }

    public function registerBlogRepo()
    {
        return $this->app->bind('App\Repositories\BlogRepositoryInterface', 'App\Repositories\BlogRepository');
    }
}
