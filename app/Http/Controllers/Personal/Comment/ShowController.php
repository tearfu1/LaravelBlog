<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Comment $comment)
    {
        return view('personal.comment.show', compact('comment'));
    }
}
