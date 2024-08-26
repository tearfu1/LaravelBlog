<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $posts = Post::paginate(5);
        return view('admin.posts.index', compact('posts'));
    }
}
