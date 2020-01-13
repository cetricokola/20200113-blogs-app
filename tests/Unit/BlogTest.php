<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use DatabaseTransactions;

    public function test_fetch_blogs()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);

    }

    public function test_add_blogs()
    {
        $blogs = [
            "user_id" => 1,
            "title" => "Cytonn Weekly",
            "body" => "You should automate everything you would test manually. You can test the page rendered to the client to be sure it contains the right information. You can test that buttons click, links go to the right place, forms act as they should, you can also test to ensure certain information exists on a page",
        ];
        $response = $this->post("/post_blog", $blogs);

        $this->assertDatabaseHas("blogs", $blogs);

        $response->assertStatus(302);
    }

    public function test_delete_blog()
    {
        $this->delete('delete_blog/1');
        $this->assertDatabaseMissing('blogs',['id' => 1]);
    }

}
