<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id',$post->category_id)
            ->where('id','!=',$post->id)
            ->get()
            ->take(3);
        return view('posts.show', compact('post','date', 'relatedPosts'));
    }
}
